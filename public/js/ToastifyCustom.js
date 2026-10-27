class ToastifyCustom {
    constructor(Toastify) {
        this._Toastify = Toastify;
    }

    error(options) {
        this._Toastify({
            ...options,
            duration: options.duration || 3000,
            backgroundColor: "#ff5555",
        }).showToast();
    }

    success(options) {
        this._Toastify({
            ...options,
            duration: options.duration || 3000,
            backgroundColor: "#198754",
        }).showToast();
    }

    warning(options) {
        this._Toastify({
            ...options,
            duration: options.duration || 3000,
            backgroundColor: "#ffc107",
        }).showToast();
    }
}

// create instance from class ToastifyCustom and parse Toastify to parameter from package Toastify js
const toastify = new ToastifyCustom(Toastify);
