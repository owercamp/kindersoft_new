<nav class="border-b-4 border-gray-100 bg-white dark:border-cyan-600 dark:bg-gray-900" x-data="{ open: false }">
  <!-- Primary Navigation Menu -->
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 justify-between">
      <div class="flex">
        <!-- Logo -->
        <div class="flex shrink-0 items-center">
          <a href="{{ route('dashboard') }}">
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
          </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden space-x-8 text-center sm:-my-px sm:ms-10 sm:flex">

          <x-dropdown-first-level>
            <x-slot name="trigger">
              {{ trans('Configuration') }}
            </x-slot>
            <x-slot name="content">
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Kindergarten Information') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link href="{{ route('general-information') }}">
                    {{ trans('General Information') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('tax-information') }}">
                    {{ trans('Tax Information') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('corporate-images') }}">
                    {{ trans('Corporate Images') }}
                  </x-nav-link>
                  <x-dropdown-second-level>
                    <x-slot name="trigger">
                      {{ trans('Printing Templates') }}
                    </x-slot>
                    <x-slot name="content">
                      <x-dropdown-second-level>
                        <x-slot name="trigger">
                          {{ trans('Admissions Templates') }}
                        </x-slot>
                        <x-slot name="content">
                          <x-nav-link href="{{ route('downloadCommercial') }}">
                            {{ trans('Commercial Proposal') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadCooperative') }}">
                            {{ trans('Educational Cooperation Contract') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadLegal') }}">
                            {{ trans('Guarantee Document Promissory Note') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadAuthorization') }}">
                            {{ trans('Data Processing Authorization') }}
                          </x-nav-link>
                        </x-slot>
                      </x-dropdown-second-level>
                      <x-dropdown-second-level>
                        <x-slot name="trigger">
                          {{ trans('Administrative Templates') }}
                        </x-slot>
                        <x-slot name="content">
                          <x-nav-link href="{{ route('downloadIndefiniteTermContract') }}">
                            {{ trans('Indefinite Term Contract') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadFixedTermContract') }}">
                            {{ trans('Fixed Term Contract') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadContractTerminalWorkLaborContract') }}">
                            {{ trans('Contract Work or Labor') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadPerformaneEvaluation') }}">
                            {{ trans('Performance Evaluation') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadPayrollReport') }}">
                            {{ trans('Payroll Report') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadAdministrativeReport') }}">
                            {{ trans('Administrative Report') }}
                          </x-nav-link>
                        </x-slot>
                      </x-dropdown-second-level>
                      <x-dropdown-second-level>
                        <x-slot name="trigger">
                          {{ trans('Academic Templates') }}
                        </x-slot>
                        <x-slot name="content">
                          <x-nav-link href="{{ route('downloadCertificationSchool') }}">
                            {{ trans('School Certification') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadPlanningWeekly') }}">
                            {{ trans('Weekly Planning') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadPeriodReport') }}">
                            {{ trans('Period Report') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadSchoolBulletin') }}">
                            {{ trans('School Newsletter') }}
                          </x-nav-link>
                        </x-slot>
                      </x-dropdown-second-level>
                      <x-dropdown-second-level>
                        <x-slot name="trigger">
                          {{ trans('Logistics Templates') }}
                        </x-slot>
                        <x-slot name="content">
                          <x-nav-link href="{{ route('downloadAttendanceControl') }}">
                            {{ trans('Attendance Control') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadNewsDaily') }}">
                            {{ trans('Daily News') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadGrowthAndDevelopment') }}">
                            {{ trans('Growth and Development') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadSpecialReports') }}">
                            {{ trans('Special Reports') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadInformativeCirculars') }}">
                            {{ trans('Informative Circulars') }}
                          </x-nav-link>
                          <x-nav-link href="{{ route('downloadSchoolAgenda') }}">
                            {{ trans('School Agenda') }}
                          </x-nav-link>
                        </x-slot>
                      </x-dropdown-second-level>
                      <x-dropdown-second-level>
                        <x-slot name="trigger">
                          {{ trans('Financial Templates') }}
                        </x-slot>
                        <x-slot name="content">
                          <x-nav-link>
                            {{ trans('Electronic Invoice') }}
                          </x-nav-link>
                          <x-nav-link>
                            {{ trans('Debit Note') }}
                          </x-nav-link>
                          <x-nav-link>
                            {{ trans('Credit Note') }}
                          </x-nav-link>
                          <x-nav-link>
                            {{ trans('Income Voucher') }}
                          </x-nav-link>
                          <x-nav-link>
                            {{ trans('Proof of Expenditure') }}
                          </x-nav-link>
                        </x-slot>
                      </x-dropdown-second-level>
                    </x-slot>
                  </x-dropdown-second-level>
                  <x-dropdown-second-level>
                    <x-slot name="trigger">
                      {{ trans('Notifications and Mail') }}
                    </x-slot>
                    <x-slot name="content">
                      <x-nav-link href="{{ route('notification-administrative') }}">
                        {{ trans('Administrative Notifications') }}
                      </x-nav-link>
                      <x-nav-link href="{{ route('notification-admission') }}">
                        {{ trans('Notifications Admissions') }}
                      </x-nav-link>
                      <x-nav-link href="{{ route('notification-academic') }}">
                        {{ trans('Academic Notifications') }}
                      </x-nav-link>
                      <x-nav-link>
                        {{ trans('Logistics Notifications') }}
                      </x-nav-link>
                      <x-nav-link>
                        {{ trans('Financial Notifications') }}
                      </x-nav-link>
                    </x-slot>
                  </x-dropdown-second-level>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Database Structure') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Access Security') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('structure.calendar') }}">
                    {{ trans('School Calendar') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.databases.creation-document') }}">
                    {{ trans('Document Creation') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.databases.health-care-provider') }}">
                    {{ trans('Health Care Provider') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.databases.employment-positions') }}">
                    {{ trans('Employment Positions') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('School Contract Minutes') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Transportation Contract Minutes') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Human Resources') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link href="{{ route('configurations.human-resources.collaborators') }}">
                    {{ trans('Collaborators') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.human-resources.attendants') }}">
                    {{ trans('Attendees') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.human-resources.students') }}">
                    {{ trans('Students') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.human-resources.providers') }}">
                    {{ trans('Suppliers') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Products and Services') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link href="{{ route('configurations.products-and-services.admissions') }}">
                    {{ trans('Admissions') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.journays') }}">
                    {{ trans('Journays') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.feeding') }}">
                    {{ trans('Feeding') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.uniforms') }}">
                    {{ trans('Uniforms') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.school-supplies') }}">
                    {{ trans('School Supplies') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.extratimes') }}">
                    {{ trans('Additional Time') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.extracurriculars') }}">
                    {{ trans('Extracurricular') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.products-and-services.transportation') }}">
                    {{ trans('Transportation') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Academic Programs') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link href="{{ route('configurations.academic-programs.grades') }}">
                    {{ trans('Grades') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.academic-programs.courses') }}">
                    {{ trans('Courses') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.academic-programs.periods') }}">
                    {{ trans('Periods') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.academic-programs.intelligence') }}">
                    {{ trans('Intelligences') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.academic-programs.achievements') }}">
                    {{ trans('Achievements') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('configurations.academic-programs.remarks') }}">
                    {{ trans('Remarks') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
            </x-slot>
          </x-dropdown-first-level>

          <x-dropdown-first-level>
            <x-slot name="trigger">
              {{ trans('Administrative') }}
            </x-slot>
            <x-slot name="content">
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Personnel Selection') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('item') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Recruitment of Personnel') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('item') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Performance Evaluation') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('item') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Payroll Report') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('item') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Administrative Reports') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('item') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
            </x-slot>
          </x-dropdown-first-level>

          <x-dropdown-first-level>
            <x-slot name="trigger">
              {{ trans('Admissions') }}
            </x-slot>
            <x-slot name="content">
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Potential Customer') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link href="{{ route('admissions.potential-customer.registration') }}">
                    {{ trans('Registration') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('admissions.potential-customer.scheduling') }}">
                    {{ trans('Scheduling') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('admissions.potential-customer.archive') }}">
                    {{ trans('Archive') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('admissions.potential-customer.statistics') }}">
                    {{ trans('Statistics') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Commercial Proposal') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link href="{{ route('admissions.commercial-proposal.customers') }}">
                    {{ trans('Customers') }}
                  </x-nav-link>
                  <x-nav-link href="{{ route('admissions.commercial-proposal.quotation') }}">
                    {{ trans('Quote') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Follow-up') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Archive') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Statistics') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Enrollment Form') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Registration') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Approval') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Payment Support') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Migration') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Archive') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Enrollment Process') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Order of Enrollment') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Legalization of Registration') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Contract Generation') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('School Certifications') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Archive') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
            </x-slot>
          </x-dropdown-first-level>

          <x-dropdown-first-level>
            <x-slot name="trigger">
              {{ trans('Academic') }}
            </x-slot>
            <x-slot name="content">
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('School Structure') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Course Assignment') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Activity Space') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Classes and Activities') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('School Programming') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Academic Periods') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Weekly Schedule') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Activity Basis') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Chronological Planning') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('School Evaluation') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Weekly Follow-up') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Closing Period') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Period Report') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('School Newsletter') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
            </x-slot>
          </x-dropdown-first-level>

          <x-dropdown-first-level>
            <x-slot name="trigger">
              {{ trans('Logistics') }}
            </x-slot>
            <x-slot name="content">
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Attendance Control') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Attendance Record') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Absence Record') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Statistics') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Daily News') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Additional Control') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Food Control') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Sphincter Control') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Nursing Control') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Closing Daily Report') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Event Programming') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Event Creation') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Event Scheduling') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Event Tracking') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Statistics') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Growth and Development') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Healthcare Professional') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Health Observations') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Vaccination Scheme') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Periodic Valuations') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Statistics') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Special Reports') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Report Configuration') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('List of Courses') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Customer Reports') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Carnetization') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Informative Circulars') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Body Creation') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Creation of Circular') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Archive') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('School Diary') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Greeting Template') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Subject Template') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Daily Information') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Archive') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
            </x-slot>
          </x-dropdown-first-level>

          <x-dropdown-first-level>
            <x-slot name="trigger">
              {{ trans('Financial') }}
            </x-slot>
            <x-slot name="content">
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Statement of Account') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('January') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('February') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('March') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('April') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('May') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('June') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('July') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('August') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('September') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('October') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('November') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('December') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Accounting') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Electronic Invoicing') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Accounts Receivable') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Debit Notes') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Credit Notes') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Revenue Vouchers') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Egress Vouchers') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Bank Reconciliation') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Canceled Invoices') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Sales Statistics') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
              <x-dropdown-second-level>
                <x-slot name="trigger">
                  {{ trans('Budget') }}
                </x-slot>
                <x-slot name="content">
                  <x-nav-link>
                    {{ trans('Cost Structure') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Description of Costs') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Annual Budget') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Monthly Follow-Up') }}
                  </x-nav-link>
                  <x-nav-link>
                    {{ trans('Annual Closing') }}
                  </x-nav-link>
                </x-slot>
              </x-dropdown-second-level>
            </x-slot>
          </x-dropdown-first-level>
        </div>
      </div>

      <div class="hidden sm:ms-6 sm:flex sm:items-center">
        <!-- Teams Dropdown -->
        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
          <div class="relative ms-3">
            <x-dropdown align="right" width="60">
              <x-slot name="trigger">
                <span class="inline-flex rounded-md">
                  <button
                    class="inline-flex items-center rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:bg-gray-50 focus:outline-none active:bg-gray-50 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 dark:focus:bg-gray-700 dark:active:bg-gray-700"
                    type="button">
                    {{ Auth::user()->currentTeam->name }}

                    <svg class="-me-0.5 ms-2 h-4 w-4" fill="none" stroke-width="1.5" stroke="currentColor"
                      viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" stroke-linecap="round"
                        stroke-linejoin="round" />
                    </svg>
                  </button>
                </span>
              </x-slot>

              <x-slot name="content">
                <div class="w-60">
                  <!-- Team Management -->
                  <div class="block px-4 py-2 text-xs text-gray-400">
                    {{ trans('Manage Team') }}
                  </div>

                  <!-- Team Settings -->
                  <x-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                    {{ trans('Team Settings') }}
                  </x-dropdown-link>

                  @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                    <x-dropdown-link href="{{ route('teams.create') }}">
                      {{ trans('Create New Team') }}
                    </x-dropdown-link>
                  @endcan

                  <!-- Team Switcher -->
                  @if (Auth::user()->allTeams()->count() > 1)
                    <div class="border-t border-gray-200 dark:border-gray-600"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                      {{ trans('Switch Teams') }}
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
        <div class="relative ms-3">
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <button
                  class="flex rounded-full border-2 border-transparent text-sm transition focus:border-gray-300 focus:outline-none">
                  <img alt="{{ Auth::user()->name }}" class="h-8 w-8 rounded-full object-cover"
                    src="{{ Auth::user()->profile_photo_url }}" />
                </button>
              @else
                <span class="inline-flex rounded-md">
                  <button
                    class="inline-flex items-center gap-1 rounded-md border border-transparent bg-white px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out hover:text-gray-700 focus:bg-gray-50 focus:outline-none active:bg-gray-50 dark:bg-gray-900 dark:text-gray-400 dark:hover:text-gray-300 dark:focus:bg-gray-900 dark:active:bg-gray-900"
                    type="button">
                    <svg class="h-6 w-6" fill="none" stroke-width="1.5" stroke="currentColor"
                      viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M10.343 3.94c.09-.542.56-.94 1.11-.94h1.093c.55 0 1.02.398 1.11.94l.149.894c.07.424.384.764.78.93.398.164.855.142 1.205-.108l.737-.527a1.125 1.125 0 0 1 1.45.12l.773.774c.39.389.44 1.002.12 1.45l-.527.737c-.25.35-.272.806-.107 1.204.165.397.505.71.93.78l.893.15c.543.09.94.559.94 1.109v1.094c0 .55-.397 1.02-.94 1.11l-.894.149c-.424.07-.764.383-.929.78-.165.398-.143.854.107 1.204l.527.738c.32.447.269 1.06-.12 1.45l-.774.773a1.125 1.125 0 0 1-1.449.12l-.738-.527c-.35-.25-.806-.272-1.203-.107-.398.165-.71.505-.781.929l-.149.894c-.09.542-.56.94-1.11.94h-1.094c-.55 0-1.019-.398-1.11-.94l-.148-.894c-.071-.424-.384-.764-.781-.93-.398-.164-.854-.142-1.204.108l-.738.527c-.447.32-1.06.269-1.45-.12l-.773-.774a1.125 1.125 0 0 1-.12-1.45l.527-.737c.25-.35.272-.806.108-1.204-.165-.397-.506-.71-.93-.78l-.894-.15c-.542-.09-.94-.56-.94-1.109v-1.094c0-.55.398-1.02.94-1.11l.894-.149c.424-.07.765-.383.93-.78.165-.398.143-.854-.108-1.204l-.526-.738a1.125 1.125 0 0 1 .12-1.45l.773-.773a1.125 1.125 0 0 1 1.45-.12l.737.527c.35.25.807.272 1.204.107.397-.165.71-.505.78-.929l.15-.894Z"
                        stroke-linecap="round" stroke-linejoin="round" />
                      <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <div class="flex flex-col gap-1">
                      <p>{{ trans('Welcome') }} (a)</p>
                      <p>{{ Auth::user()->name }}</p>
                    </div>
                    <svg class="-me-0.5 ms-2 h-4 w-4" fill="none" stroke-width="1.5" stroke="currentColor"
                      viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.5 8.25l-7.5 7.5-7.5-7.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </button>
                </span>
              @endif
            </x-slot>

            <x-slot name="content">
              <!-- Account Management -->
              <div class="block px-4 py-2 text-xs text-gray-400">
                {{ trans('Manage Account') }}
              </div>

              <x-dropdown-link href="{{ route('profile.show') }}">
                {{ trans('Profile') }}
              </x-dropdown-link>

              @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                  {{ trans('API Tokens') }}
                </x-dropdown-link>
              @endif

              <div class="border-t border-gray-200 dark:border-gray-600"></div>

              <!-- Authentication -->
              <form action="{{ route('logout') }}" method="POST" x-data>
                @csrf

                <x-dropdown-link @click.prevent="$root.submit();" href="{{ route('logout') }}">
                  {{ trans('Log Out') }}
                </x-dropdown-link>
              </form>
            </x-slot>
          </x-dropdown>
        </div>
      </div>

      <!-- Hamburger -->
      <div class="-me-2 flex items-center sm:hidden">
        <button @click="open = ! open"
          class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 transition duration-150 ease-in-out hover:bg-gray-100 hover:text-gray-500 focus:bg-gray-100 focus:text-gray-500 focus:outline-none dark:text-gray-500 dark:hover:bg-gray-900 dark:hover:text-gray-400 dark:focus:bg-gray-900 dark:focus:text-gray-400">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" d="M4 6h16M4 12h16M4 18h16"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" d="M6 18L18 6M6 6l12 12"
              stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
    <div class="space-y-1 pb-3 pt-2">
      <x-responsive-nav-link :active="request()->routeIs('dashboard')" href="{{ route('dashboard') }}">
        {{ trans('Dashboard') }}
      </x-responsive-nav-link>
    </div>

    <!-- Responsive Settings Options -->
    <div class="border-t border-gray-200 pb-1 pt-4 dark:border-gray-600">
      <div class="flex items-center px-4">
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
          <div class="me-3 shrink-0">
            <img alt="{{ Auth::user()->name }}" class="h-10 w-10 rounded-full object-cover"
              src="{{ Auth::user()->profile_photo_url }}" />
          </div>
        @endif

        <div>
          <div class="text-base font-medium text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
          <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
        </div>
      </div>

      <div class="mt-3 space-y-1">
        <!-- Account Management -->
        <x-responsive-nav-link :active="request()->routeIs('profile.show')" href="{{ route('profile.show') }}">
          {{ trans('Profile') }}
        </x-responsive-nav-link>

        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
          <x-responsive-nav-link :active="request()->routeIs('api-tokens.index')" href="{{ route('api-tokens.index') }}">
            {{ trans('API Tokens') }}
          </x-responsive-nav-link>
        @endif

        <!-- Authentication -->
        <form action="{{ route('logout') }}" method="POST" x-data>
          @csrf

          <x-responsive-nav-link @click.prevent="$root.submit();" href="{{ route('logout') }}">
            {{ trans('Log Out') }}
          </x-responsive-nav-link>
        </form>

        <!-- Team Management -->
        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
          <div class="border-t border-gray-200 dark:border-gray-600"></div>

          <div class="block px-4 py-2 text-xs text-gray-400">
            {{ trans('Manage Team') }}
          </div>

          <!-- Team Settings -->
          <x-responsive-nav-link :active="request()->routeIs('teams.show')" href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
            {{ trans('Team Settings') }}
          </x-responsive-nav-link>

          @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
            <x-responsive-nav-link :active="request()->routeIs('teams.create')" href="{{ route('teams.create') }}">
              {{ trans('Create New Team') }}
            </x-responsive-nav-link>
          @endcan

          <!-- Team Switcher -->
          @if (Auth::user()->allTeams()->count() > 1)
            <div class="border-t border-gray-200 dark:border-gray-600"></div>

            <div class="block px-4 py-2 text-xs text-gray-400">
              {{ trans('Switch Teams') }}
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
