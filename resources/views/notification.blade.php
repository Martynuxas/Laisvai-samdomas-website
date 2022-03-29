@component('mail::message')
# Pranešimas

Jūs gavote naują pranešimą!

@component('mail::button', ['url' => 'http://localhost:8000/pranesimai'])
Peržiurėti
@endcomponent

Pagarbiai,<br>
LaisvaiSamdomas.lt komanda
@endcomponent
