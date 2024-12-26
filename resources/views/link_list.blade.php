<?php
if (!function_exists('extractPrefixedId')) {

    function extractPrefixedId(string $url, string $prefix = ''): ?int
    {
        $pattern = '(\d+)$';
        if ($prefix) {
            $pattern = '\/' . preg_quote($prefix, '/') . '\/' . $pattern;
        } else {
            $pattern = '\/' . $pattern;
        }
        $pattern = '/' . $pattern . '/';
        $match = null;

        if (preg_match($pattern, rtrim($url, '/'), $matches)) {
            $match = (int)$matches[1];
        }

        return $match;
    }
}
?>
@if(isset($entities) && isset($routeName))
    @php $links = []; @endphp
    @foreach($entities as $id)
        @php
            $newId = extractPrefixedId($id);
            $links[] = '<a href="' . route($routeName, ['id' => $newId]) . '">' . e($newId) . '</a>'
        @endphp
    @endforeach
    {!! implode(', ', $links) !!}
@endif
<?php
