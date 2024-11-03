<nav x-data="{ open: false }" class="bg-white dark:bg-gray-900 border-b-4 border-gray-100 dark:border-cyan-600">
  <!-- Primary Navigation Menu -->
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
          <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
          </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex text-center">

          <x-dropdown-first-level>
            <x-slot name="trigger">
              {{ __('Configuration') }}
            </x-slot>
            <x-slot name="content">
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Kindergarten Information') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link href="{{ route('general-information') }}">
                    {{ __('General Information') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('tax-information') }}">
                    {{ __('Tax Information') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('corporate-images') }}">
                    {{ __('Corporate Images') }}
                  </x-nav-link>
                  <x-dropdown-second-level>
                    <x-slot name="trigger">
                      {{ __('Printing Templates') }}
                    </x-slot>
                    <x-slot name="content">
                      <x-dropdown-second-level>
                        <x-slot name="trigger">
                          {{ __('Admissions Templates') }}
                        </x-slot>
                        <x-slot name="content">
                          <x-nav-link href="{{ route('downloadCommercial') }}">
                            {{ __('Commercial Proposal') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadCooperative') }}">
                            {{ __('Educational Cooperation Contract') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadLegal') }}">
                            {{ __('Guarantee Document Promissory Note') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadAuthorization') }}">
                            {{ __('Data Processing Authorization') }}
                          </x-nav-link>
                        </x-slot>
                      </x-dropdown-second-level>
                      <x-dropdown-second-level>
                        <x-slot name="trigger">
                          {{ __('Administrative Templates') }}
                        </x-slot>
                        <x-slot name="content">
                          <x-nav-link href="{{ route('downloadIndefiniteTermContract') }}">
                            {{ __('Indefinite Term Contract') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadFixedTermContract') }}">
                            {{ __('Fixed Term Contract') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadContractTerminalWorkLaborContract') }}">
                            {{ __('Contract Work or Labor') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadPerformaneEvaluation') }}">
                            {{ __('Performance Evaluation') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadPayrollReport') }}">
                            {{ __('Payroll Report') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadAdministrativeReport') }}">
                            {{ __('Administrative Report') }}
                          </x-nav-link>
                        </x-slot>
                      </x-dropdown-second-level>
                      <x-dropdown-second-level>
                        <x-slot name="trigger">
                          {{ __('Academic Templates') }}
                        </x-slot>
                        <x-slot name="content">
                          <x-nav-link href="{{ route('downloadCertificationSchool') }}">
                            {{ __('School Certification') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadPlanningWeekly') }}">
                            {{ __('Weekly Planning') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadPeriodReport') }}">
                            {{ __('Period Report') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadSchoolBulletin') }}">
                            {{ __('School Newsletter') }}
                          </x-nav-link>
                        </x-slot>
                      </x-dropdown-second-level>
                      <x-dropdown-second-level>
                        <x-slot name="trigger">
                          {{ __('Logistics Templates') }}
                        </x-slot>
                        <x-slot name="content">
                          <x-nav-link href="{{ route('downloadAttendanceControl') }}">
                            {{ __('Attendance Control') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadNewsDaily') }}">
                            {{ __('Daily News') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadGrowthAndDevelopment') }}">
                            {{ __('Growth and Development') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadSpecialReports') }}">
                            {{ __('Special Reports') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadInformativeCirculars') }}">
                            {{ __('Informative Circulars') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadSchoolAgenda') }}">
                            {{ __('School Agenda') }}
                          </x-nav-link>
                        </x-slot>
                      </x-dropdown-second-level>
                      <x-dropdown-second-level>
                        <x-slot name="trigger">
                          {{ __('Financial Templates') }}
                        </x-slot>
                        <x-slot name="content">
                          <x-nav-link>
                            {{ __('Electronic Invoice') }}
                          </x-nav-link>
                          <x-nav-link>
                            {{ __('Debit Note') }}
                          </x-nav-link>
                          <x-nav-link>
                            {{ __('Credit Note') }}
                          </x-nav-link>
                          <x-nav-link>
                            {{ __('Income Voucher') }}
                          </x-nav-link>
                          <x-nav-link>
                            {{ __('Proof of Expenditure') }}
                          </x-nav-link>
                        </x-slot>
                      </x-dropdown-second-level>
                    </x-slot>
                  </x-dropdown-second-level>
                  <x-dropdown-second-level>
                    <x-slot name="trigger">
                      {{ __('Notifications and Mail') }}
                    </x-slot>
                    <x-slot name="content">
                      <x-nav-link>
                        {{ __('Administrative Notifications') }}
                      </x-nav-link>
                      <x-nav-link>
                        {{ __('Notifications Admissions') }}
                      </x-nav-link>
                      <x-nav-link>
                        {{ __('Academic Notifications') }}
                      </x-nav-link>
                      <x-nav-link>
                        {{ __('Logistics Notifications') }}
                      </x-nav-link>
                      <x-nav-link>
                        {{ __('Financial Notifications') }}
                      </x-nav-link>
                    </x-slot>
                  </x-dropdown-second-level>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Database Structure') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Access Security') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('structure.calendar') }}">
                    {{ __('School Calendar') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.databases.creation-document') }}">
                    {{ __('Document Creation') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.databases.health-care-provider') }}">
                    {{ __('Health Care Provider') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.databases.employment-positions') }}">
                    {{ __('Employment Positions') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('School Contract Minutes') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Transportation Contract Minutes') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Human Resources')}}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link href="{{ route('configurations.human-resources.collaborators') }}">
                    {{ __('Collaborators') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.human-resources.attendants') }}">
                    {{ __('Attendees') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.human-resources.students') }}">
                    {{ __('Students') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.human-resources.providers') }}">
                    {{ __('Suppliers') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Products and Services')}}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link href="{{ route('configurations.products-and-services.admissions') }}">
                    {{ __('Admissions') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.journays') }}">
                    {{ __('Journays') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.feeding') }}">
                    {{ __('Feeding') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.uniforms') }}">
                    {{ __('Uniforms') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.school-supplies') }}">
                    {{ __('School Supplies') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.extratimes') }}">
                    {{ __('Additional Time') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.extracurriculars') }}">
                    {{ __('Extracurricular') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.transportation') }}">
                    {{ __('Transportation') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Academic Programs')}}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link href="{{ route('configurations.academic-programs.grades') }}">
                    {{ __('Grades') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.academic-programs.courses') }}">
                    {{ __('Courses') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.academic-programs.periods') }}">
                    {{ __('Periods') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.academic-programs.intelligence') }}">
                    {{ __('Intelligences') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.academic-programs.achievements') }}">
                    {{ __('Achievements') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.academic-programs.remarks') }}">
                    {{ __('Remarks') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
            </x-slot>
          </x-dropdown-first-level>

          <x-dropdown-first-level>
            <x-slot name="trigger">
              {{ __('Administrative') }}
            </x-slot>
            <x-slot name="content">
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Personnel Selection') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('item') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Recruitment of Personnel') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('item') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Performance Evaluation') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('item') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Payroll Report') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('item') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Administrative Reports') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('item') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
            </x-slot>
          </x-dropdown-first-level>

          <x-dropdown-first-level>
            <x-slot name="trigger">
              {{ __('Admissions') }}
            </x-slot>
            <x-slot name="content">
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Potential Customer') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link href="{{ route('admissions.potential-customer.registration') }}">
                    {{ __('Registration') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('admissions.potential-customer.scheduling') }}">
                    {{ __('Scheduling') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('admissions.potential-customer.archive') }}">
                    {{ __('Archive') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Statistics') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Commercial Proposal') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Customers') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Quote') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Follow-up') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Archive') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Statistics') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Enrollment Form') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Registration') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Approval') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Payment Support') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Migration') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Archive') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Enrollment Process') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Order of Enrollment') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Legalization of Registration') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Contract Generation') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('School Certifications') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Archive') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
            </x-slot>
          </x-dropdown-first-level>

          <x-dropdown-first-level>
            <x-slot name="trigger">
              {{ __('Academic') }}
            </x-slot>
            <x-slot name="content">
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('School Structure') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Course Assignment') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Activity Space') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Classes and Activities') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('School Programming') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Academic Periods') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Weekly Schedule') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Activity Basis') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Chronological Planning') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('School Evaluation') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Weekly Follow-up') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Closing Period') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Period Report') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('School Newsletter') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
            </x-slot>
          </x-dropdown-first-level>

          <x-dropdown-first-level>
            <x-slot name="trigger">
              {{ __('Logistics') }}
            </x-slot>
            <x-slot name="content">
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Attendance Control') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Attendance Record') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Absence Record') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Statistics') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Daily News') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Additional Control') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Food Control') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Sphincter Control') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Nursing Control') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Closing Daily Report') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Event Programming') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Event Creation') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Event Scheduling') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Event Tracking') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Statistics') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Growth and Development') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Healthcare Professional') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Health Observations') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Vaccination Scheme') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Periodic Valuations') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Statistics') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Special Reports') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Report Configuration') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('List of Courses') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Customer Reports') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Carnetization') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Informative Circulars') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Body Creation') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Creation of Circular') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Archive') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('School Diary') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Greeting Template') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Subject Template') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Daily Information') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Archive') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
            </x-slot>
          </x-dropdown-first-level>

          <x-dropdown-first-level>
            <x-slot name="trigger">
              {{ __('Financial') }}
            </x-slot>
            <x-slot name="content">
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Statement of Account') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('January') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('February') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('March') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('April') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('May') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('June') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('July') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('August') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('September') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('October') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('November') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('December') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Accounting') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Electronic Invoicing') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Accounts Receivable') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Debit Notes') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Credit Notes') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Revenue Vouchers') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Egress Vouchers') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Bank Reconciliation') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Canceled Invoices') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Sales Statistics') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ __('Budget') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ __('Cost Structure') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Description of Costs') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Annual Budget') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Monthly Follow-Up') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ __('Annual Closing') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
            </x-slot>
          </x-dropdown-first-level>
        </div>
      </div>

      <div class="hidden sm:flex sm:items-center sm:ms-6">
        <!-- Teams Dropdown -->
        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
        <div class="ms-3 relative">
          <x-dropdown align="right" width="60">
            <x-slot name="trigger">
              <span class="inline-flex rounded-md">
                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700 transition ease-in-out duration-150">
                  {{ Auth::user()->currentTeam->name }}

                  <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                  </svg>
                </button>
              </span>
            </x-slot>

            <x-slot name="content">
              <div class="w-60">
                <!-- Team Management -->
                <div class="block px-4 py-2 text-xs text-gray-400">
                  {{ __('Manage Team') }}
                </div>

                <!-- Team Settings -->
                <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                  {{ __('Team Settings') }}
                </x-dropdown-link>

                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                <x-dropdown-link href="{{ route('teams.create') }}">
                  {{ __('Create New Team') }}
                </x-dropdown-link>
                @endcan

                <!-- Team Switcher -->
                @if (Auth::user()->allTeams()->count() > 1)
                <div class="border-t border-gray-200 dark:border-gray-600"></div>

                <div class="block px-4 py-2 text-xs text-gray-400">
                  {{ __('Switch Teams') }}
                </div>

                @foreach (Auth::user()->allTeams() as $team)
                <x-switchable-team :team="$team" />
                @endforeach
                @endif
              </div>
            </x-slot>
          </x-dropdown>
        </div>
        @endif

        <!-- Settings Dropdown -->
        <div class="ms-3 relative">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
              <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
              </button>
              @else
              <span class="inline-flex rounded-md">
                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-900 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none focus:bg-gray-50 dark:focus:bg-gray-900 active:bg-gray-50 dark:active:bg-gray-900 transition ease-in-out duration-150 gap-1">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                  </svg>
                  <div class="flex flex-col gap-1">
                    <p>{{ __('Welcome')}} (a)</p>
                    <p>{{ Auth::user()->name }}</p>
                  </div>
                  <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                  </svg>
                </button>
              </span>
              @endif
            </x-slot>

            <x-slot name="content">
              <!-- Account Management -->
              <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Account') }}
              </div>

              <x-dropdown-link href="{{ route('profile.show') }}">
                {{ __('Profile') }}
              </x-dropdown-link>

              @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
              <x-dropdown-link href="{{ route('api-tokens.index') }}">
                {{ __('API Tokens') }}
              </x-dropdown-link>
              @endif

              <div class="border-t border-gray-200 dark:border-gray-600"></div>

              <!-- Authentication -->
              <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                  {{ __('Log Out') }}
                </x-dropdown-link>
              </form>
            </x-slot>
          </x-dropdown>
        </div>
      </div>

      <!-- Hamburger -->
      <div class="-me-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
          <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
      <x-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        {{ __('Dashboard') }}
      </x-responsive-nav-link>
    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
      <div class="flex items-center px-4">
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div class="shrink-0 me-3">
          <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
        </div>
        @endif

        <div>
          <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
          <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>
      </div>

      <div class="mt-3 space-y-1">
        <!-- Account Management -->
        <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
          {{ __('Profile') }}
        </x-responsive-nav-link>

        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
        <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
          {{ __('API Tokens') }}
        </x-responsive-nav-link>
        @endif

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}" x-data>
          @csrf

          <x-responsive-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
            {{ __('Log Out') }}
          </x-responsive-nav-link>
        </form>

        <!-- Team Management -->
        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
        <div class="border-t border-gray-200 dark:border-gray-600"></div>

        <div class="block px-4 py-2 text-xs text-gray-400">
          {{ __('Manage Team') }}
        </div>

        <!-- Team Settings -->
        <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
          {{ __('Team Settings') }}
        </x-responsive-nav-link>

        @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
        <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
          {{ __('Create New Team') }}
        </x-responsive-nav-link>
        @endcan

        <!-- Team Switcher -->
        @if (Auth::user()->allTeams()->count() > 1)
        <div class="border-t border-gray-200 dark:border-gray-600"></div>

        <div class="block px-4 py-2 text-xs text-gray-400">
          {{ __('Switch Teams') }}
        </div>

        @foreach (Auth::user()->allTeams() as $team)
        <x-switchable-team :team="$team" component="responsive-nav-link" />
        @endforeach
        @endif
        @endif
      </div>
    </div>
  </div>
</nav>
