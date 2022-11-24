<x-admin.quotes.form 
    button="{{ __('main.update') }}" 
    title="{{ __('main.edit_your_quote') }}" 
    :action="route('admin.quote',[request('movie'), request('quote')])"
    :quote="$quote"
    patch
/>