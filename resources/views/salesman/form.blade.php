<!-- <h4 class="form-section text-dark"><i class="fa-solid fa-user-tie text-dark"></i>Personal Information</h4> -->
<div class="row">
    <div class="col-md-6 form-group">
        <label for="name">Full Name<span class="text-danger">*</span></label>
        <input type="text" id="name" class="form-control" placeholder="Enter Full Name" name="name"
        @if($chkurl == 'salesman.edit') value="{{$data->name}}" @else value="{{old('name')}}" required @endif>
    </div>
    <div class="col-md-6 form-group">
        <label for="phone">Mobile Number<span class="text-danger">*</span></label>
        <input type="number" id="phone" class="form-control phone" placeholder="Enter Mobile" name="phone"
        @if($chkurl == 'salesman.edit') value="{{$data->phone}}" @else value="{{old('phone')}}" required @endif>
    </div>
    <div class="col-md-6 form-group">
        <label for="email">Email<span class="text-danger">*</span></label>
        <input type="email" id="email" class="form-control" placeholder="Enter Email" name="email"
        @if($chkurl == 'salesman.edit') value="{{$data->email}}" @else value="{{old('email')}}" required @endif>
    </div>
    <div class="col-md-6 form-group">
        <label for="username">Username<span class="text-danger">*</span></label>
        <input type="text" id="username" class="form-control" placeholder="Enter Username" name="username"
        @if($chkurl == 'salesman.edit') value="{{$data->username}}" readonly @else value="{{old('username')}}" required  @endif>
    </div>
    @if($chkurl == 'salesman.create')
    <div class="col-md-6 form-group">
        <label for="password">Create Password<span class="text-danger">*</span></label>
        <input type="password" id="password" class="form-control" placeholder="Create Password" name="password"
        @if($chkurl == 'salesman.create') required @endif>
    </div>
    <div class="col-md-6 form-group">
        <label for="password-confirm">Confirm Password<span class="text-danger">*</span></label>
        <input type="password" id="password-confirm" class="form-control" placeholder="Confirm Password" name="password_confirmation"
        @if($chkurl == 'salesman.create') required @endif>
    </div>
    @else
    <div class="col-md-6 form-group">
        <label for="password">Change Password</label>
        <input type="password" id="password" class="form-control" placeholder="Change Password" name="password">
    </div>
    @endif
</div>