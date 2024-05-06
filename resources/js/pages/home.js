import '../../scss/pages/home.scss'


const modal = document.querySelector('#confirmation-modal .modal-content')
const form = document.querySelector('.confirmation-form')
const btnConfirmation = document.getElementById('confirmation-button');

const resetModal = () => {
	form.classList.remove('was-validated')
	modal.classList.remove('busy', 'error', 'confirmed')
}

btnConfirmation.addEventListener('click', async () => {
	resetModal()
})

form.addEventListener('submit', async e => {
	e.preventDefault()
	e.stopPropagation()
	resetModal()
	form.classList.add('was-validated')

	if (!form.checkValidity()) {
		document.querySelector('.was-validated .form-control:invalid').focus()
		return
	}

	modal.classList.add('busy')

	const response = await fetch(window.laravel.urlAttendanceConfirmation, {
		method: 'POST',
		// mode: 'cors', // no-cors, *cors, same-origin
		// cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
		// credentials: 'same-origin', // include, *same-origin, omit
		headers: {
			'Accept': 'application.json',
			'Content-Type': 'application/json',
			'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
		},
		body: JSON.stringify({
			firstname: document.getElementById('firstname').value,
			lastname: document.getElementById('lastname').value,
			company: document.getElementById('company').value,
			email: document.getElementById('email').value,
			phone: document.getElementById('phone').value,
		}),
	})

	const result = await response.json()

	resetModal()

	if (result.success) {
		modal.classList.add('confirmed')
	} else {
		console.log(result);
		modal.classList.add('error')
	}
}, false)


// document.getElementById('confirmation-button').click()