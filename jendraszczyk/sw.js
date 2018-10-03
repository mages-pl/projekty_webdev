this.addEventListener('install', function(event) {
   
    event.waitUntil(
            
    caches.open('app-cache').then(function (cache) {
               
    return cache.addAll([
    'index.html',
    './js/creative.js',
    './css/creative.css'
    ]);
    })
    );
 
});  

this.addEventListener('fetch',function(event)  {
    
    event.respondWith(caches.match(event.request).then(
            function (response) {
        return response ? response : fetch(event.request);
    
    }));
});