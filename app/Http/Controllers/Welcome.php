<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Rstacode\Otpiq\DTOs\SmsData;
use Rstacode\Otpiq\Facades\Otpiq;
use WireUi\Traits\WireUiActions;

class Welcome extends Component
{
    use WireUiActions;

    public $phoneNumber, $verificationCode = "1234", $customMessage, $senderId, $provider = "auto", $smsId;

    public $apiKey;
    public function setApiKey()
    {
        $this->validate([
            'apiKey' => 'required|string|min:20',
        ]);
        Cache::put('otpiq_api_key', $this->apiKey, now()->addHours(24));
        $this->reset('apiKey');
        $this->dispatch('notify', [
            'message' => 'API Key set successfully!',
            'type'    => 'success',
        ]);
    }

    public function removeApiKey()
    {
        Cache::forget('otpiq_api_key');
        $this->dispatch('notify', [
            'message' => 'API Key removed successfully!',
            'type'    => 'success',
        ]);
    }

    public function getApiKey()
    {
        return Cache::get('otpiq_api_key');
    }

    public function callApiKey()
    {
        if (! $this->getApiKey()) {
            $this->dialog()->show([
                'icon'        => 'error',
                'title'       => 'Error Dialog!',
                'description' => 'Woops, its an error.',
            ]);
            return;
        }
        config(['otpiq.api_key' => $this->getApiKey()]);

    }

    public function save()
    {
        $this->callApiKey();
        try {
            $response = Otpiq::sendSms(new SmsData(
                phoneNumber: $this->phoneNumber,
                smsType: 'verification',
                provider: $this->provider,
                verificationCode: $this->verificationCode
            ));
            return dd($response);
        } catch (\Exception $exception) {
            return dd($exception->getMessage());
        }
    }
    public function save2()
    {
        $this->callApiKey();
        try {
            $response = Otpiq::sendSms(new SmsData(
                phoneNumber: $this->phoneNumber,
                smsType: 'custom',
                customMessage: $this->customMessage,
                senderId: $this->senderId,
            ));
        } catch (\Exception $exception) {
            return dd($exception->getMessage());
        }
    }

    public function getProjectInformation()
    {
        $this->callApiKey();
        try {
            $projectInfo = Otpiq::getProjectInfo();
            return dd($projectInfo);
        } catch (\Exception $exception) {
            return dd($exception->getMessage());
        }
    }
    public function getProjectSenderIds()
    {
        $this->callApiKey();
        try {
            $senderIds = Otpiq::getSenderIds();
            return dd($senderIds);
        } catch (\Exception $exception) {
            return dd($exception->getMessage());
        }
    }
    public function save3()
    {
        $this->callApiKey();
        try {
            $status = Otpiq::trackSms($this->smsId);
            return dd($status);
        } catch (\Exception $exception) {
            return dd($exception->getMessage());
        }
    }
    public function render()
    {
        $array = [
            'providers' => [
                ['name' => 'Auto', 'value' => 'auto'],
                ['name' => 'SMS', 'value' => 'sms'],
                ['name' => 'Whatsapp', 'value' => 'whatsapp'],
                ['name' => 'Telegram', 'value' => 'telegram'],
            ],
            'hasApiKey' => (bool) $this->getApiKey(),
        ];
        return view('welcome', $array)->extends('layouts.app');
    }
}
