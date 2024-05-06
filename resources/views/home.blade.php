@extends('layouts.app')

@section('content')
	<div class="wrapper">
		<div class="header">
			<button type="button" id="confirmation-button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#confirmation-modal">
				<i class="fa-solid fa-person-walking-arrow-right"></i>
				Confirm your attendance
			</button>
		</div>
		<div class="presentation"></div>
	</div>
@endsection


@push('assets')
	@vite($entries)
@endpush


@section('modals')
	<div class="modal fade" id="confirmation-modal" tabindex="-1" aria-labelledby="confirmation-modal-label" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="confirmation-modal-label">Confirmation</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form class="row confirmation-form needs-validation" novalidate>
						<div class="col-12 mb-3">
							<div class="form-floating">
								<input type="text" class="form-control fw-semibold" id="firstname" required placeholder="First name" aria-label="First name">
								<label for="firstname" class="fst-italic text-black-50">First name</label>
							</div>
						</div>
						<div class="col-12 mb-3">
							<div class="form-floating">
								<input type="text" class="form-control fw-semibold" id="lastname" required placeholder="Last name" aria-label="Last name">
								<label for="lastname" class="fst-italic text-black-50">Last name</label>
							</div>
						</div>
						<div class="col-12 mb-3">
							<div class="form-floating">
								<input type="text" class="form-control fw-semibold" id="company" placeholder="Company (optional)" aria-label="Company (optional)">
								<label for="company" class="fst-italic text-black-50">Company (optional)</label>
							</div>
						</div>
						<div class="col-12 mb-3">
							<div class="form-floating">
								<input type="email" class="form-control fw-semibold" id="email" required placeholder="name@example.com" aria-label="E-mail address">
								<label for="email" class="fst-italic text-black-50">E-mail address</label>
							</div>
						</div>
						<div class="col-12 mb-4">
							<div class="form-floating">
								<input type="text" class="form-control fw-semibold" id="phone" required placeholder="Phone with prefix" aria-label="Phone with prefix">
								<label for="phone" class="fst-italic text-black-50">Phone with prefix</label>
							</div>
						</div>
						<div class="col-12 mb-4 text-danger error-message">
							<div class="fw-semibold">An error occurred while sending your confirmation!</div>
							<small>Please try again.</small>
						</div>
						<div class="col-12">
							<button type="submit" id="confirm-button" class="btn btn-success float-end">
								<i class="fa-solid fa-check"></i>
								Confirm my attendance
							</button>
						</div>
					</form>
					<div class="confirmed-message">
						<div class="text-success fs-5 fw-semibold">Your attendance has been confirmed.</div>
						Thank you.
					</div>
				</div>
				<div class="sending-email">
					<i class="fa-solid fa-spinner fa-spin"></i>
				</div>
			</div>
		</div>
	</div>
@endsection


@push('assets')
	<script>
		window.laravel = {
			urlAttendanceConfirmation: '{{ route("attendance-confirmation") }}',
		}
	</script>
@endpush