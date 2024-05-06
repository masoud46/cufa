<x-mail::message>

<table style="font-size: 16px; line-height: 28px; margin-bottom: 20px;">
<tr>
<td style="color: #95a0b0; font-style: italic; text-align: right; padding-right: 6px;">First name:</td>
<td style="color: #000000;">{{ $firstname }}</td>
</tr>
<tr>
<td style="color: #95a0b0; font-style: italic; text-align: right; padding-right: 6px;">Last name:</td>
<td style="color: #000000;">{{ $lastname }}</td>
</tr>
<tr>
<td style="color: #95a0b0; font-style: italic; text-align: right; padding-right: 6px;">Company:</td>
<td style="color: #000000;">{{ $company ?? "" }}</td>
</tr>
<tr>
<td style="color: #95a0b0; font-style: italic; text-align: right; padding-right: 6px;">E-mail:</td>
<td><a style="text-decoration: none;" href="mailto:{{ $email }}">{{ $email }}</a></td>
</tr>
<tr>
<td style="color: #95a0b0; font-style: italic; text-align: right; padding-right: 6px;">Phone:</td>
<td><a style="text-decoration: none;" href="tel:{{ $phone }}">{{ $phone }}</a></td>
</tr>
</table>
{{-- <div style="display: flex; font-size: 16px; line-height: 32px; margin-bottom: 16px;">
<div style="text-align: right;">
<i style="opacity: 0.75; margin-right: 8px;">First name: </i><br>
<i style="opacity: 0.75; margin-right: 8px;">Last name: </i><br>
<i style="opacity: 0.75; margin-right: 8px;">Company: </i><br>
<i style="opacity: 0.75; margin-right: 8px;">E-mail: </i><br>
<i style="opacity: 0.75; margin-right: 8px;">Phone: </i>
</div>
<div style="color: #000000;">
{{ $firstname }}<br>
{{ $lastname }}<br>
{{ $company ?? "" }}<br>
<a style="text-decoration: none;" href="mailto:{{ $email }}">{{ $email }}</a><br>
<a style="text-decoration: none;" href="tel:{{ $phone }}">{{ $phone }}</a>
</div>
</div> --}}

<div style="text-align: center;">
<img src="{{ $message->embed(public_path('/assets/img/logo-bird-email.png')) }}" style="width: 60px; height: auto;" alt="logo">
</div>

</x-mail::message>
