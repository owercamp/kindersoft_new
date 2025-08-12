<div>
  <!-- Generate API Token -->
  <x-form-section submit="createApiToken">
    <x-slot name="title">
      {{ trans('Create API Token') }}
    </x-slot>

    <x-slot name="description">
      {{ trans('API tokens allow third-party services to authenticate with our application on your behalf.') }}
    </x-slot>

    <x-slot name="form">
      <!-- Token Name -->
      <div class="col-span-6 sm:col-span-4">
        <x-label for="name" value="{{ trans('Token Name') }}" />
        <x-input autofocus class="mt-1 block w-full" id="name" type="text" wire:model="createApiTokenForm.name" />
        <x-input-error class="mt-2" for="name" />
      </div>

      <!-- Token Permissions -->
      @if (Laravel\Jetstream\Jetstream::hasPermissions())
        <div class="col-span-6">
          <x-label for="permissions" value="{{ trans('Permissions') }}" />

          <div class="mt-2 grid grid-cols-1 gap-4 md:grid-cols-2">
            @foreach (Laravel\Jetstream\Jetstream::$permissions as $permission)
              <label class="flex items-center">
                <x-checkbox :value="$permission" wire:model="createApiTokenForm.permissions" />
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ $permission }}</span>
              </label>
            @endforeach
          </div>
        </div>
      @endif
    </x-slot>

    <x-slot name="actions">
      <x-action-message class="me-3" on="created">
        {{ trans('Created.') }}
      </x-action-message>

      <x-button>
        {{ trans('Create') }}
      </x-button>
    </x-slot>
  </x-form-section>

  @if ($this->user->tokens->isNotEmpty())
    <x-section-border />

    <!-- Manage API Tokens -->
    <div class="mt-10 sm:mt-0">
      <x-action-section>
        <x-slot name="title">
          {{ trans('Manage API Tokens') }}
        </x-slot>

        <x-slot name="description">
          {{ trans('You may delete any of your existing tokens if they are no longer needed.') }}
        </x-slot>

        <!-- API Token List -->
        <x-slot name="content">
          <div class="space-y-6">
            @foreach ($this->user->tokens->sortBy('name') as $token)
              <div class="flex items-center justify-between">
                <div class="break-all dark:text-white">
                  {{ $token->name }}
                </div>

                <div class="ms-2 flex items-center">
                  @if ($token->last_used_at)
                    <div class="text-sm text-gray-400">
                      {{ trans('Last used') }} {{ $token->last_used_at->diffForHumans() }}
                    </div>
                  @endif

                  @if (Laravel\Jetstream\Jetstream::hasPermissions())
                    <button class="ms-6 cursor-pointer text-sm text-gray-400 underline"
                      wire:click="manageApiTokenPermissions({{ $token->id }})">
                      {{ trans('Permissions') }}
                    </button>
                  @endif

                  <button class="ms-6 cursor-pointer text-sm text-red-500"
                    wire:click="confirmApiTokenDeletion({{ $token->id }})">
                    {{ trans('Delete') }}
                  </button>
                </div>
              </div>
            @endforeach
          </div>
        </x-slot>
      </x-action-section>
    </div>
  @endif

  <!-- Token Value Modal -->
  <x-dialog-modal wire:model.live="displayingToken">
    <x-slot name="title">
      {{ trans('API Token') }}
    </x-slot>

    <x-slot name="content">
      <div>
        {{ trans('Please copy your new API token. For your security, it won\'t be shown again.') }}
      </div>

      <x-input :value="$plainTextToken" @showing-token-modal.window="setTimeout(() => $refs.plaintextToken.select(), 250)"
        autocapitalize="off" autocomplete="off" autocorrect="off" autofocus
        class="mt-4 w-full break-all rounded bg-gray-100 px-4 py-2 font-mono text-sm text-gray-500" readonly
        spellcheck="false" type="text" x-ref="plaintextToken" />
    </x-slot>

    <x-slot name="footer">
      <x-secondary-button wire:click="$set('displayingToken', false)" wire:loading.attr="disabled">
        {{ trans('Close') }}
      </x-secondary-button>
    </x-slot>
  </x-dialog-modal>

  <!-- API Token Permissions Modal -->
  <x-dialog-modal wire:model.live="managingApiTokenPermissions">
    <x-slot name="title">
      {{ trans('API Token Permissions') }}
    </x-slot>

    <x-slot name="content">
      <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        @foreach (Laravel\Jetstream\Jetstream::$permissions as $permission)
          <label class="flex items-center">
            <x-checkbox :value="$permission" wire:model="updateApiTokenForm.permissions" />
            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ $permission }}</span>
          </label>
        @endforeach
      </div>
    </x-slot>

    <x-slot name="footer">
      <x-secondary-button wire:click="$set('managingApiTokenPermissions', false)" wire:loading.attr="disabled">
        {{ trans('Cancel') }}
      </x-secondary-button>

      <x-button class="ms-3" wire:click="updateApiToken" wire:loading.attr="disabled">
        {{ trans('Save') }}
      </x-button>
    </x-slot>
  </x-dialog-modal>

  <!-- Delete Token Confirmation Modal -->
  <x-confirmation-modal wire:model.live="confirmingApiTokenDeletion">
    <x-slot name="title">
      {{ trans('Delete API Token') }}
    </x-slot>

    <x-slot name="content">
      {{ trans('Are you sure you would like to delete this API token?') }}
    </x-slot>

    <x-slot name="footer">
      <x-secondary-button wire:click="$toggle('confirmingApiTokenDeletion')" wire:loading.attr="disabled">
        {{ trans('Cancel') }}
      </x-secondary-button>

      <x-danger-button class="ms-3" wire:click="deleteApiToken" wire:loading.attr="disabled">
        {{ trans('Delete') }}
      </x-danger-button>
    </x-slot>
  </x-confirmation-modal>
</div>
