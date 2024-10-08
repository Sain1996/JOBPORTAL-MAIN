<h1>Manage Subscription Plans</h1>
<button class="btn btn-primary btn-sm" style="margin-bottom: 20px;" onclick="location.href='{{ url('super') }}'">
    <i class="fas fa-home" style="color: blue;"></i> Home Page
</button>
<div class="subscription-form-container" style="padding: 20px; margin-bottom: 20px; text-align: center; border: 1px solid #ddd; border-radius: 5px;">
    <span>New Subscription Plan:</span>
    <form action="{{ route('store.subscription.plan') }}" method="post" style="display: inline-block;">
        @csrf
        <input type="text" id="plan" name="plan" placeholder="Add new subscription plan name" style="width: 300px; padding: 10px; margin-bottom: 20px;" onkeyup="showSubmitButton()">
        <input type="text" id="amount" name="amount" placeholder="Enter the amount here (in dollars)" style="width: 300px; padding: 10px; margin-bottom: 20px;" onkeyup="showSubmitButton()" oninput="this.value = this.value.replace(/[^0-9.]/g, '')">
        <button class="subscription-submit-btn" style="display: none; background-color: #4CAF50; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; float: right;">Submit</button>
    </form>
    <div id="message" style="display: none; color: green; font-weight: bold; margin-top: 10px;">New subscription plan added successfully!</div>
</div>
<table style="border-collapse: collapse; width: 100%; margin-bottom: 20px;">
    <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 10px; text-align: center;">#</th>
            <th style="border: 1px solid #ddd; padding: 10px;">Subscription Plan</th>
            <th style="border: 1px solid #ddd; padding: 10px; text-align: center;">Amount (in dollars)</th>
            <th style="border: 1px solid #ddd; padding: 10px; text-align: center;">Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($subscriptionPlans as $index => $subscriptionPlan)
        <tr>
            <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">{{ $loop->iteration }}</td>
            <td style="border: 1px solid #ddd; padding: 10px;">{{ $subscriptionPlan->plan }}</td>
            <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">{{ $subscriptionPlan->amount }}</td>
            <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">
            <form action="{{ route('update.subscription.plan.status', $subscriptionPlan->plan) }}" method="post">
             @csrf
             @method('patch')
             <input type="hidden" name="name" value="{{ $subscriptionPlan->name }}">
             <input type="checkbox" name="status" {{ $subscriptionPlan->status ? 'checked' : '' }} onchange="this.form.submit()">
            </form>

            </td>
        </tr>
    @endforeach
</tbody>
</table>
<script>
    function showSubmitButton() {
        var planInput = document.getElementById('plan');
        var amountInput = document.getElementById('amount');
        var submitButton = document.querySelector('.subscription-submit-btn');
        if (planInput.value.trim() !== '' && amountInput.value.trim() !== '') {
            submitButton.style.display = 'inline-block';
        } else {
            submitButton.style.display = 'none';
        }
    }
    @if(session('success'))
        document.getElementById('message').style.display = 'block';
        document.getElementById('message').style.opacity = 0;
        setTimeout(() => {
            document.getElementById('message').style.transition = 'opacity 0.5s ease-in';
            document.getElementById('message').style.opacity = 1;
            setTimeout(() => {
                document.getElementById('message').style.transition = 'opacity 0.5s ease-out';
                document.getElementById('message').style.opacity = 0;
                setTimeout(() => {
                    document.getElementById('message').style.display = 'none';
                }, 500);
            }, 5000);
        }, 100);
    @endif
</script>
