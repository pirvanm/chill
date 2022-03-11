export default function({ $axios, redirect, $auth, $router }) {
    $axios.onError(error => {
        if (error.response.status === 401) {
            if ($auth.loggedIn) {
                $auth.logout();
            }
        }
    });
}
