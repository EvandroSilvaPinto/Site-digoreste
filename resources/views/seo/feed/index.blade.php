<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<rss version="2.0"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:wfw="http://wellformedweb.org/CommentAPI/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:atom="http://www.w3.org/2005/Atom"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
    >
    <channel>
        <title>{!!Config::get('app.appTitle')!!}</title>
        <atom:link href="{!!route('feed')!!}" rel="self" type="application/rss+xml" />
        <link>{!!url("/")!!}</link>
        <description>{!!str_limit(Config::get('app.appDescription'), 155)!!}</description>
        <language>pt-BR</language>
        <sy:updatePeriod>hourly</sy:updatePeriod>
        <sy:updateFrequency>1</sy:updateFrequency>
        @if (!empty($itens))
            @foreach ($itens as $value)
                <item>
                    @if (!empty($value->title))
                        <title>{!!$value->title!!}</title>
                    @endif

                    @if (!empty($value->url))
                        <link>{!!$value->url!!}</link>
                    @endif

                    @if (!empty($value->created_at))
                        <pubDate>{!!$value->created_at!!}</pubDate>
                    @endif

                    @if (!empty($value->url))
                        <guid isPermaLink="false">{!!$value->url!!}</guid>
                    @endif

                    @if (!empty($value->text))
                        <description><![CDATA[{!!character_limiter($value->text, 350)!!}]]></description>
                        <content:encoded><![CDATA[{!!$value->text!!}]]></content:encoded>
                    @endif
                    
                    @if (!empty($value->image))
                        <enclosure url="{!!$value->image!!}" length="{!!$value->image_length!!}" type="{!!$value->image_type!!}" />
                    @endif
                </item>
            @endforeach
        @endif
    </channel>
</rss>
