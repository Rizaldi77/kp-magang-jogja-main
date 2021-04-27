<x-app-layout title="Attendance">
    <div class="">
        <div>
            <h2 class="text-2xl font-semibold leading-tight">{{ __('Attendance') }}</h2>
        </div>
        @if(\Auth::user()->apprenticeTeam)
        <div class="pt-4 overflow-x-auto">
            <div class="tableFixHead inline-block min-w-full overflow-hidden border border-gray-300 rounded-md">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="text-xs font-semibold border-b border-gray-300 tracking-wide text-left text-gray-500 uppercase dark:border-gray-700 bg-gray-50">
                            <th
                                class="px-5 py-3 border-b border-gray-300 z-20 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Date
                            </th>
                            <th
                                class="px-5 py-3 border-b border-gray-300 z-20 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-5 py-3 border-b border-gray-300 z-20 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($absen as $key => $a)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="block">
                                    {{$absen[$key]->date_att}}
                                </span>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                                    {{$absen[$key]->status_early}}
                                </span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <livewire:attendance>
                                {{-- <button class="text-green-600" onclick="alert('berhasil absen!')">Attendance</button> --}}
                            </td>
                        </tr>
                        @endforeach
                        {{-- <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="block">
                                    27 Maret 2021 
                                </span>
                                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                                    07:30 - 08:00
                                </span>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-red-600 bg-red-200">
                                    late
                                </span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="#" class="text-green-600">Attendance</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="block">
                                    27 Maret 2021 
                                </span>
                                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                                    07:30 - 08:00
                                </span>
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="#" class="text-green-600">Attendance</a>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        @if(\Auth::user()->adminDetail)
        <div class="pt-4 overflow-x-auto">
            <div class="tableFixHead inline-block min-w-full overflow-hidden border border-gray-300 rounded-md">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="text-xs font-semibold border-b border-gray-300 tracking-wide text-left text-gray-500 uppercase dark:border-gray-700 bg-gray-50">
                            <th
                                class="px-5 py-3 border-b border-gray-300 z-20 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Name
                            </th>
                            <th
                                class="px-5 py-3 border-b border-gray-300 z-20 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                University
                            </th>
                            <th
                                class="px-5 py-3 border-b border-gray-300 z-20 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($team as $key =>$tm)
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    @foreach ($team[$key]->apprenticeUser as $key => $value)
                                    <span class="block">
                                        {{$value->fullname}}
                                    </span>
                                    @endforeach
                                
                            </td>

                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span class="block">
                                    {{$tm->university}} 
                                </span>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="/attendance/detail/{{ $tm->id }}" class="text-green-600">Lihat Detail</a>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</x-app-layout>