<section>
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Profile Information</h6>
                    <p>Update your account's profile information and email address.</p>
                    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-sm-12 col-xl-12 mb-3">
                                <div class="d-flex justify-content-center align-items-center">
                                <div class="image-container" onclick="document.getElementById('fileInput').click();">
                                    <img id="profileImage" src="{{ asset('uploads/avatars/'. $authUser->userDetail->avatar ?? 'default-avatar.jpg')  }}" alt="Profile Photo">
                                    <div class="overlay">Click to upload</div>
                                </div>
                                <input type="file" name="avatar" id="fileInput" class="file-input" accept="image/*" onchange="previewImage(event)">
                            </div>
                        </div>
                            <div class="col-sm-12 col-xl-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            </div>
                            <div class="col-sm-12 col-xl-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Gender</label>
                                <input type="text" name="gender" value="{{ $user->userDetail->gender }}" class="form-control">
                            </div>
                            <div class="col-sm-12 col-xl-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                                <input type="text" name="phone_number" value="{{ $user->userDetail->phone_number }}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-6 mb-3">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                                    @if ($errors->get('email'))
                                        <div class="text-danger mt-2">
                                            @foreach ($errors->get('email') as $error)
                                                <p>{{ $error }}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                
                                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                        <div class="mt-2">
                                            <p class="text-warning">
                                                {{ __('Your email address is unverified.') }}
                                                <button form="send-verification" class="btn btn-link p-0">
                                                    {{ __('Click here to re-send the verification email.') }}
                                                </button>
                                            </p>
                                
                                            @if (session('status') === 'verification-link-sent')
                                                <p class="mt-2 text-success">
                                                    {{ __('A new verification link has been sent to your email address.') }}
                                                </p>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6 mb-3">
                                <label for="exampleInputEmail1" class="form-label">NIN (National Identification Number)</label>
                                <input type="text" value="{{ $user->userDetail->nin_number }}" class="form-control" disabled>
                            </div>
                            @role(['Staff', 'Secretary', 'Admin'])
                            <div class="col-sm-12 col-xl-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">PSN</label>
                                <input type="text" name="psn" value="{{ $user->userDetail->psn }}" class="form-control">
                            </div>
                            <div class="col-sm-12 col-xl-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Grade Level</label>
                                <input type="text" name="grade_level" value="{{ $user->userDetail->grade_level }}" class="form-control">
                            </div>
                            <div class="col-sm-12 col-xl-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Rank</label>
                                <input type="text" name="rank" value="{{ $user->userDetail->rank }}" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Schedule</label>
                                <input type="text" name="schedule" value="{{ $user->userDetail->schedule }}" class="form-control">
                            </div>
                            <div class="col-sm-12 col-xl-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Employment Date</label>
                                <input type="date" name="employment_date" value="{{ $user->userDetail->employment_date }}" class="form-control">
                            </div>
                            <div class="col-sm-12 col-xl-4 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Date of Birth</label>
                                <input type="date" name="date_of_birth" value="{{ $user->userDetail->date_of_birth }}" class="form-control">
                            </div>
                        </div>
                        @endrole
                        <div style="text-align: left;">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                            @if (session('status') === 'profile-updated')
                                <div class="alert alert-success alert-dismissible fade show" role="alert"
                                    id="statusMessage">
                                    {{ __('Saved.') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <script>
                                    setTimeout(() => {
                                        document.getElementById('statusMessage').classList.remove('show');
                                    }, 2000);
                                </script>
                            @endif
                            {{-- <button type="reset" class="btn btn-secondary">Reset</button> --}}
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- Form End -->
</section>
