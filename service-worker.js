// service-worker.js
self.addEventListener('push', (event) => {
    const payload = event.data ? event.data.json() : {};
    const title = payload.title || 'Water Level Alert';
    const options = {
        body: payload.message || 'Warning: Water level is critically high!',
        icon: 'image/water-level-3-48.png', // Optional: Add an icon for the notification
    };

    event.waitUntil(
        self.registration.showNotification(title, options)
    );
});

// Handle messages from the application
self.addEventListener('message', (event) => {
    const { title, message } = event.data;
    self.registration.showNotification(title, {
        body: message,
        icon: 'image/water-level-3-48.png', // Optional: Add an icon for the notification
    });
});