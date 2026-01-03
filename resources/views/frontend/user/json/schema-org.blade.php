<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        @foreach($user as $item)
        "@type": "Person",
        "email": "{{ $item->email }}",
        "image": "-",
        "jobTitle": "-",
        "name": "{{ $item->name }}",
        "telephone": "-",
        "url": "-"
    }
    @endforeach
</script>