@section('content')
@include ('alerts.flash-messages')

<section class="wrapper flex flex-col md:flex-row md:justify-between md:space-x-10">
    <div class="ml-72 w-2/3">
        <div class="flex flex-row justify-between mb-10">
            <h4 class="h4">Employees</h4>
            <div>
                <a href="{{route('employees.create')}}" class="btn-primary" />
                New employee
                </a>
            </div>
        </div>
        <div class="relative shadow sm:rounded-lg">
            <table class="table-style">
                <thead class="thread">
                    <tr>
                        <th scope="col" class="th">
                            Name
                        </th>
                        <th scope="col" class="th">
                            Designation
                        </th>
                        <th scope="col" class="th">
                            Joined date
                        </th>
                        <th scope="col" class="th">
                            Salary
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($employees)
                    @foreach($employees as $employee)
                    <tr class="tr">
                        <td scope="row" class="td">
                            {{ $employee->name }}
                        </td>
                        <td class="td-main">
                            {{ $employee->designation }}
                        </td>
                        <td class="td">
                            {{ $employee->joined_date }}
                        </td>
                        <td class="td">
                            {{ $employee->salary }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button id="dropdownMenuIconButton{{ $employee->id }}" data-dropdown-toggle="dropdownDots{{ $employee->id }}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-bg_dark dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="1"></circle>
                                    <circle cx="12" cy="5" r="1"></circle>
                                    <circle cx="12" cy="19" r="1"></circle>
                                </svg>
                            </button>
                        </td>
                    </tr>
                    {{-- @include('pages.employees.index-dropdown') --}}
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
