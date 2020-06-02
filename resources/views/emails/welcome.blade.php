@component('mail::message')
# {{$data['name']}}
bienvenue a "FOOTBALL ARENA"
<br>
Merci pour votre abonnement

utilisez ces données pour acceder a votre espace

<p><strong>Email:</strong>{{$data['email']}}</p>
<p><strong>mot de passe:</strong>{{$password}}</p>
@component('mail::button', ['url' => ''])
acceder a votre espace
@endcomponent
n'hesitez pas de nous contacter pour toutes questions,<br>
T-cody
@endcomponent
