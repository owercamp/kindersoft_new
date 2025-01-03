<table>
  <thead>
    <tr>
      <th colspan="2">
        {{ __('Potential Customer') }}
      </th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{{ rtrim(__('Attendees'), 's') }}</td>
      <td>{{ $potentialCustomer->name_attendant }}</td>
    </tr>
    <tr>
      <td>{{ __('Phone') }}</td>
      <td>{{ $potentialCustomer->phone }}</td>
    </tr>
    <tr>
      <td>WhatsApp</td>
      <td>{{ $potentialCustomer->whatsapp }}</td>
    </tr>
    <tr>
      <td>{{ __('Email') }}</td>
      <td>{{ $potentialCustomer->email }}</td>
    </tr>
    <tr>
      <td>{{ __('Registration') }} {{ __('Number') }}</td>
      <td>{{ str_pad($potentialCustomer->register, 4, '0', STR_PAD_LEFT) }}</td>
    </tr>
    <tr>
      <td>{{ __('Applicant') }}</td>
      <td>{{ $potentialCustomer->name_applicant }}</td>
    </tr>
    <tr>
      <td>{{ __('Genre') }}</td>
      <td>{{ $potentialCustomer->genre->name }}</td>
    </tr>
    <tr>
      <td>{{ __('validation.attributes.date_of_birth') }}</td>
      <td>{{ $potentialCustomer->birthdate[1] }}</td>
    </tr>
  </tbody>
</table>
