<x-app-layout title="Attendance">
    <div class="">
        <div>
            <h2 class="text-2xl font-semibold leading-tight">{{ __('Attendance') }}</h2>
        </div>
        <livewire:detail-attendance :data="$apprentice">
    </div>
</x-app-layout>