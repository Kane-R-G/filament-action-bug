<x-filament-panels::page>
    @php
        $arguments = ['message' => 'HELLO'];
    @endphp

    @if($this->testVisibleAction->isVisible())
        {{ ($this->testVisibleAction)($arguments) }}
    @endif

    @if($this->testVisibleClosureWithoutArgumentsAction->isVisible())
        {{ ($this->testVisibleClosureWithoutArgumentsAction)($arguments) }}
    @endif

    @if($this->testVisibleClosureArgumentsAction->isVisible())
        {{ ($this->testVisibleClosureArgumentsAction)($arguments) }}
    @endif

    @if($this->testVisibleHardCodedAction->isVisible())
        {{ ($this->testVisibleHardCodedAction)($arguments) }}
    @endif

    @if($this->testVisibleHardCodedFromClosureAction->isVisible())
        {{ ($this->testVisibleHardCodedFromClosureAction)($arguments) }}
    @endif

    <x-filament-actions::modals />
</x-filament-panels::page>
