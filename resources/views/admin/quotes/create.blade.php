<x-admin.quotes.form 
    button="Save" 
    title="Share your favorite quote" 
    :action="route('admin.quote.store',[app()->getLocale(),request('movie')])"
/>