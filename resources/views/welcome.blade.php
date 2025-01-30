<div class="flex flex-col gap-5 items-center justify-center">
    <div class="flex flex-col items-center justify-center gap-2 w-full">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-black drop-shadow mb-5">{{ env('APP_NAME') }}
        </h1>
        <p class="text-black text-xl">The Most Reliable SMS Verification Platform for Iraq</p>
        <p class="text-black">
            Send verification codes via SMS, WhatsApp, or Telegram. Perfect for businesses in Iraq and Kurdistan.
        </p>
        <div class="flex items-center justify-center gap-4">
            <a href="https://github.com/rstacode/otpiq"
                class="flex items-center justify-center gap-3 text-white bg-black drop-shadow rounded-3xl px-5 py-2">
                @svg('phosphor-github-logo', 'h-5 w-5')
                Github
            </a>
            <a href="https://otpiq.com/"
                class="flex items-center justify-center gap-3 text-black bg-white drop-shadow rounded-3xl px-5 py-2">
                @svg('phosphor-globe-hemisphere-east-light', 'h-5 w-5')
                Visit Website
            </a>
        </div>
    </div>



    <!-- Demo Forms -->
    <div class="grid grid-cols-1 lg:grid-cols-2 2xl:grid-cols-3 gap-5 w-full">
        <form wire:submit='save'
            class="bg-white/50 border-2 border-white backdrop-blur p-6 flex flex-col gap-4 rounded-3xl h-max">
            <div class="flex items-center gap-2 mb-2">
                @svg('phosphor-shield-check', 'h-5 w-5')
                <span class="font-bold text-lg">Send Verification Code</span>
            </div>
            <x-input wire:model='phoneNumber' placeholder="964750XXXXXXX" label="Phone Number" />
            <x-input wire:model='verificationCode' placeholder="Enter verification code" label="Verification Code" />
            <x-select label="Provider" placeholder="Select Provider" wire:model='provider' :options="$providers"
                option-label="name" option-value="value" />
            <x-button type="submit" label="Send Code" black spinner="save" lg />
        </form>

        <form wire:submit='save2'
            class="bg-white/50 border-2 border-white backdrop-blur p-6 flex flex-col gap-4 rounded-3xl h-max">
            <div class="flex items-center gap-2 mb-2">
                @svg('phosphor-chat-circle-text-light', 'h-5 w-5')
                <span class="font-bold text-lg">Custom Message with Sender ID</span>
            </div>
            <x-input wire:model='phoneNumber' placeholder="964750XXXXXXX" label="Phone Number" />
            <x-input wire:model='senderId' placeholder="Your Brand Name" label="Sender ID" />
            <x-textarea wire:model='customMessage' placeholder="Enter your message" label="Message" />
            <x-button type="submit" label="Send Message" black spinner="save2" lg />
        </form>

        <div class="bg-white/50 border-2 border-white backdrop-blur p-6 flex flex-col gap-4 rounded-3xl h-max">
            <div class="flex items-center gap-2 mb-2">
                @svg('phosphor-info', 'h-5 w-5')
                <span class="font-bold text-lg">Project Information</span>
            </div>
            <x-button label="Get Project Description" black wire:click='getProjectInformation'
                spinner="getProjectInformation" lg />
            <x-button label="Get Project Sender IDs" black wire:click='getProjectSenderIds'
                spinner="getProjectSenderIds" lg />
        </div>

        <form wire:submit='save3'
            class="bg-white/50 border-2 border-white backdrop-blur p-6 flex flex-col gap-4 rounded-3xl h-max">
            <div class="flex items-center gap-2 mb-2">
                @svg('phosphor-check-circle', 'h-5 w-5')
                <span class="font-bold text-lg">Track SMS Status</span>
            </div>
            <x-input wire:model='smsId' placeholder="SMS ID" label="SMS ID" />
            <x-button type="submit" label="Check Status" black spinner="save3" lg />
        </form>
    </div>

    <!-- Installation Guide -->
    <div class="mt-16 bg-white/50 border-2 border-white backdrop-blur p-8 rounded-3xl w-full">
        <h2 class="text-2xl font-bold mb-6">Quick Installation Guide</h2>
        <div class="bg-gray-800 rounded-lg p-4 mb-4">
            <code class="text-gray-100">composer require rstacode/otpiq</code>
        </div>
        <p class="text-gray-600 mb-4">After installation, add your OTPIQ API key to your .env file:</p>
        <div class="bg-gray-800 rounded-lg p-4">
            <code class="text-gray-100">OTPIQ_API_KEY=your_api_key_here</code>
        </div>
    </div>
</div>
