<x-admin.quotes.form 
    button="{{ __('main.update') }}" 
    title="{{ __('main.edit_your_quote') }}" 
    :action="route('admin.quote',[app()->getLocale(), request('movie'), request('quote')])"
    :quote="\App\Models\Quote::find(request('quote'))->thumbnail"
    patch
/>