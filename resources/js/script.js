document.getElementById('name').addEventListener('input', function() {
    if (this.value !== '') {
        document.querySelector('.submit-btn').style.display = 'block';
    } else {
        document.querySelector('.submit-btn').style.display = 'none';
    }
});

document.querySelector('.submit-btn').addEventListener('click', function(e) {
    e.preventDefault();
    const formData = new FormData();
    formData.append('name', document.getElementById('name').value);
    const url = "{{ route('store.technology') }}";
    fetch(url, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error(error));
});
