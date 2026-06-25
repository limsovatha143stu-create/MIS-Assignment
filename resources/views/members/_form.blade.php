<div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $member->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $member->email ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Phone</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $member->phone ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Address</label>
    <input type="text" name="address" class="form-control" value="{{ old('address', $member->address ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Membership date</label>
    <input type="date" name="membership_date" class="form-control"
        value="{{ old('membership_date', isset($member) ? $member->membership_date->format('Y-m-d') : now()->format('Y-m-d')) }}" required>
</div>
