<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
     <url>
        <loc rel="canonical">{!!url("/")!!}</loc>
        <priority>1</priority>
    </url>
    @if (!empty($itens))
        @foreach ($itens as $value)
            <url>
                <loc {!!$value->priority == '1' ? 'rel="canonical"' : ''!!}>{{$value->url}}</loc>
                @if (!empty($value->image))
                    <image:image>
                        <image:loc>{!!$value->image!!}</image:loc>
                    </image:image>
                @endif
                <priority>{!!$value->priority!!}</priority>
            </url>
        @endforeach
    @endif
</urlset>