export const getNotification = () => {
    let storedNotifications = localStorage.getItem("Notification");

    if (!storedNotifications) {
        SetNotification("Welcome to Notification");
        storedNotifications = localStorage.getItem("Notification");
    }

    if (storedNotifications) {
        let notifications = JSON.parse(storedNotifications);
        notifications = cleanOldNotifications(notifications);
        localStorage.setItem("Notification", JSON.stringify(notifications));
        storedNotifications = JSON.stringify(notifications);
    }


    ToastLastNotification();

    // Clear existing dropdown content
    const dropdown = $(".Notifications-dropwdown");
    dropdown.empty();

    if (storedNotifications) {
        const notifications = JSON.parse(storedNotifications);
        const count = notifications.length;

        // Update notification count
        $(".Notifications-count").text(count);

        for(let i = count - 1; i >= 0; i--){
            dropdown.append(`
                <li class="dropdown-item">
                    <i class="bx bx-bell me-2"></i>
                    <span class="align-middle">${notifications[i].message}</span>
                </li>
            `);
        }
    } else {
        // Fallback message
        dropdown.append(`
            <li class="dropdown-item">
                <i class="bx bx-bell me-2"></i>
                <span class="align-middle">No notifications found</span>
            </li>
        `);
    }

};

export const SetNotification = (message) => {
    const time = new Date();
    const storedNotifications = localStorage.getItem("Notification");

    if (storedNotifications) {
        const notifications = JSON.parse(storedNotifications);
        notifications.push({ message, time });
        localStorage.setItem("Notification", JSON.stringify(notifications));
    } else {
        // Create new array with time included
        localStorage.setItem("Notification", JSON.stringify([{ message, time }]));
    }
};

export const ToastLastNotification = () => {
    const storedNotifications = localStorage.getItem("Notification");
    if (!storedNotifications) return;

    const notifications = JSON.parse(storedNotifications);
    const lastNotification = notifications[notifications.length - 1];

    // Convert stored time string to Date object
    const lastTime = new Date(lastNotification.time);
    const currentTime = new Date();
    const diff = currentTime - lastTime;

    // Show toast if notification is from last 10 minutes
    if (diff < 600000) {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });

        Toast.fire({
            icon: 'info',
            title: lastNotification.message
        });
    }
};


const cleanOldNotifications = (notifications) => {
    const threeDaysAgo = Date.now() - (3 * 24 * 60 * 60 * 1000);

    // First filter by date, then limit count
    let filtered = notifications.filter(notification =>
        new Date(notification.time).getTime() > threeDaysAgo
    );

    // Keep only the last 10 notifications
    if (filtered.length > 10) {
        filtered = filtered.slice(-10);
    }

    return filtered;
};
