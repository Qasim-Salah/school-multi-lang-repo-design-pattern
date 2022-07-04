<div>
    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif

    @if($show_table)
        @include('livewire.parent.includes.parent-table')
    @else
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                       class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-success' }}">1</a>
                    <p>{{ __('parent-trans.step1') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                       class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-success' }}">2</a>
                    <p>{{ __('parent-trans.step2') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                       class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-success' }}"
                       disabled="disabled">3</a>
                    <p>{{ __('parent-trans.step3') }}</p>
                </div>
            </div>
        </div>

        @include('livewire.parent.includes.father-form')

        @include('livewire.parent.includes.mother-form')

        <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
            @if ($currentStep != 3)
                <div style="display: none" class="row setup-content" id="step-3">
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12"><br>
                            <label style="color: red">{{__('parent-trans.attachments')}}</label>
                            <div class="form-group">
                                <input type="file" wire:model="file_name" accept="image/*" multiple>
                            </div>
                            <br>

                            <input type="hidden" wire:model="parent_id">

                            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                                    wire:click="back(2)">{{ __('parent-trans.back') }}</button>

                            @if($updateMode)
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                        wire:click="submit_form_edit"
                                        type="button">{{__('parent-trans.finish')}}
                                </button>
                            @else
                                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submit_form"
                                        type="button">{{ __('parent-trans.finish') }}</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
</div>
