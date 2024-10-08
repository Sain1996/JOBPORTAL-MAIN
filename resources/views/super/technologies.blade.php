<h1>Manage Technologies</h1> 
        <button class="btn btn-primary btn-sm" style="margin-bottom: 20px;" onclick="location.href='{{ url('super') }}'"> 
            <i class="fas fa-home" style="color: blue;"></i> Home Page 
        </button>
        <div class="form-container" style="padding: 20px; margin-bottom: 20px; text-align: center; border: 1px solid #ddd; border-radius: 5px;">
        <span>New Technology:</span>
        <form action="{{ route('store.technology') }}" method="post" style="display: inline-block;">
            @csrf
            <input type="text" id="name" name="name" placeholder="Add new technologies here" style="width: 300px; padding: 10px; margin-bottom: 20px;" onkeyup="showSubmitButton()">
            <button class="submit-btn" style="display: none; background-color: #4CAF50; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; float: right;">Submit</button>
        </form>
        <div id="message" style="display: none; color: green; font-weight: bold; margin-top: 10px;">New technology added successfully!</div>
    </div>
</div>
<table style="border-collapse: collapse; width: 100%; margin-bottom: 20px;">
    <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 10px; text-align: center;">#</th>
            <th style="border: 1px solid #ddd; padding: 10px;">Technology</th>
            <th style="border: 1px solid #ddd; padding: 10px; text-align: center;">Verified</th>
        </tr>
    </thead>
    <tbody>
        @foreach($technologies as $index => $technology)
            <tr>
                <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">{{ $index + 1 }}</td>
                <td style="border: 1px solid #ddd; padding: 10px;">{{ $technology->technology }}</td>
                <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">
                <form action="{{ route('update.verified', ['id' => $technology->id]) }}" method="post">
                    @csrf
                    @method('patch')

                        @csrf
                        <input type="hidden" name="technology_id" value="{{ $technology->id }}">
                        <input type="checkbox" name="verified" {{ $technology->verified ? 'checked' : '' }} onchange="this.form.submit()">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<script>
    function showSubmitButton() {
        var input = document.getElementById('name');
        var submitButton = document.querySelector('.submit-btn');
        if (input.value.trim() !== '') {
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

