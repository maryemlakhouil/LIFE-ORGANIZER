import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

const apiBaseUrl = (import.meta.env.VITE_API_URL ?? 'http://localhost/api').replace(
    /\/api$/,
    '',
);

const resolveApiToken = () =>
    window.localStorage.getItem('access_token') ||
    window.sessionStorage.getItem('access_token') ||
    null;

window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: import.meta.env.VITE_REVERB_HOST,
    wsPort: import.meta.env.VITE_REVERB_PORT ?? 80,
    wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
    forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
    enabledTransports: ['ws', 'wss'],
    authEndpoint: `${apiBaseUrl}/broadcasting/auth`,
    authorizer: (channel, options) => {
        return {
            authorize: (socketId, callback) => {
                const token = resolveApiToken();

                window.axios
                    .post(
                        options.authEndpoint,
                        {
                            socket_id: socketId,
                            channel_name: channel.name,
                        },
                        {
                            headers: {
                                Accept: 'application/json',
                                ...(token
                                    ? {
                                          Authorization: `Bearer ${token}`,
                                      }
                                    : {}),
                            },
                        },
                    )
                    .then((response) => callback(null, response.data))
                    .catch((error) => callback(error));
            },
        };
    },
});
