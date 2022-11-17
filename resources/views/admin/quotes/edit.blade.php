<x-admin.quotes.form 
    button="{{ __('Update') }}" 
    title="{{ __('Edit your quote') }}" 
    :action="route('admin.quote',[app()->getLocale(), request('movie'), request('quote')])"
    :quote="\App\Models\Quote::find(request('quote'))->thumbnail"
    patch
/>