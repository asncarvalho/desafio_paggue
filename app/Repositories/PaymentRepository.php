<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Notifications\newPayment;
use App\Repositories\Interfaces\IPaymentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class PaymentRepository implements IPaymentRepository
{
    public function __construct
        (
        private CompanyRepository $auxCompanyRepository,
        private UsersRepository $auxUsersRepository,
        ) {}

    public function create(Request $request) : Payment
    {
        if(!$this->isVerifiedAccount($request->company_reciever_id)){
            abort(401, "Conta destino não foi verificada!");
        }

        if(!$this->authorizedUser($request->user_id))
        {
            abort(401, "Usuário não autorizado a realizar pagamentos");
        }

        if(!$this->isPaymentValid($request->company_sender_id, $request->transfer_value)) {
            abort(403, "É necessário que a conta tenha o valor suficiente para fazer o pagamento!");
        }

        $payment = Payment::create($request->all());

        $this->auxCompanyRepository->draw($request->company_sender_id, (-$request->transfer_value));
        $this->auxCompanyRepository->draw($request->company_reciever_id, $request->transfer_value);

        $user = $this->auxUsersRepository->show($request->user_id);
        $reciever_company = $this->auxCompanyRepository->show($request->company_reciever_id);


        Notification::route('mail', $user->email)
            ->notify(new newPayment($user, $reciever_company, $payment));

        return $payment;
    }

    public function index()
    {
        return Payment::get();
    }

    public function show(string $id) : Payment
    {
        return Payment::find($id);
    }

    public function update(Request $request, string $id) : Payment
    {
        $payment = Payment::find($id);

        $payment->user_id = $request->user_id;
        $payment->company_id = $request->company_id;
        $payment->value = $request->value;

        return $payment->save();

    }

    public function delete(string $id) : void
    {
        $payment = Payment::find($id);

        if(!$payment){
            abort(400);
        }

        $payment->destroy();
    }

    public function isPaymentValid(string $company_id, string $pretendedValue)
    {
        $company = $this->auxCompanyRepository->show($company_id);

        return $company->value > $pretendedValue;
    }

    public function authorizedUser(string $user_id)
    {
        $role = $this->auxUsersRepository->getRole($user_id)->first();

        return $role->description == 'Administrador';
    }

    public function isVerifiedAccount(string $company_id)
    {
        $company = $this->auxCompanyRepository->show($company_id);

        return $company->status == 'Verified';
    }
}
