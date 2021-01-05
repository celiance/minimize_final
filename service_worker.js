self.skipWaiting();

const cacheName = 'cache-v1.1';
// Hier mit absoluten (/) und relativen Pfaden gearbeitet
const precacheResources = [
 'assets\arrow_black.png'
];

self.addEventListener('install', event => {
 console.log('Service worker install event!');
 event.waitUntil(
 caches.open(cacheName)
 .then(cache => {
 console.log(precacheResources)
 return cache.addAll(precacheResources);
 })
 );
});
self.addEventListener('activate', event => {
 console.log('Service worker activate event!');
});

self.addEventListener('fetch', event => {
 console.log('Fetch intercepted for:', event.request.url);
 event.respondWith(caches.match(event.request)
 .then(cachedResponse => {
 if (cachedResponse) {
 return cachedResponse;
 }
 return fetch(event.request);
 })
 );
});
