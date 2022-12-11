<div class="content-block text-truncate" id="{{ $infoTypeId }}" data-info-type-name="{{$infoTypeName}}" onclick="enterInformation('{{ $infoTypeId }}')">
    <img src="{{ $url }}" alt="" class="img-fluid"/>
    <h2 class="sub-header2 info-title mb-0">{{ Str::limit( $infoTypeName,20,'...')  }}</h2>
</div>
