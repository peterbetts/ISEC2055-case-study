<div class="min-h-screen bg-white dark:bg-zinc-900">
    <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
        <div class="space-y-8">
            <div>
                <h1 class="text-3xl font-bold">Password Reset Demo</h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">
                    Click the links below to test vulnerable vs. hardened password reset implementations.
                </p>
            </div>

            <div class="rounded-lg border border-yellow-300 bg-yellow-50 p-4 dark:border-yellow-700 dark:bg-yellow-900/30">
                <p class="text-sm text-yellow-800 dark:text-yellow-200">
                    <strong>Note:</strong> These are demo tokens for testing purposes only. In production, tokens would be sent via email.
                </p>
            </div>

            <div class="space-y-6">
                @foreach ($tokens as $item)
                    <div class="rounded-lg border border-gray-200 p-6 dark:border-gray-700">
                        <h2 class="mb-4 text-xl font-semibold">{{ $item['user']->name }} ({{ $item['user']->email }})</h2>

                        <div class="grid gap-4 md:grid-cols-2">
                            <!-- Vulnerable Version -->
                            <div class="space-y-3 rounded-lg border border-red-200 bg-red-50 p-4 dark:border-red-800 dark:bg-red-900/30">
                                <h3 class="font-semibold text-red-900 dark:text-red-200">Vulnerable Reset</h3>
                                <p class="text-sm text-red-800 dark:text-red-300">
                                    No token validation, reusable, no expiration check
                                </p>

                                <div class="break-all rounded bg-red-100 p-2 text-xs dark:bg-red-900/50">
                                    <code>{{ $item['vulnerable_token'] }}</code>
                                </div>

                                <a
                                    href="{{ $item['vulnerable_url'] }}"
                                    class="inline-block rounded bg-red-600 px-4 py-2 text-white hover:bg-red-700"
                                >
                                    Test Vulnerable Link
                                </a>
                            </div>

                            <!-- Secure Version -->
                            <div class="space-y-3 rounded-lg border border-green-200 bg-green-50 p-4 dark:border-green-800 dark:bg-green-900/30">
                                <h3 class="font-semibold text-green-900 dark:text-green-200">Secure Reset</h3>
                                <p class="text-sm text-green-800 dark:text-green-300">
                                    Token validation, single-use, 1 hour expiration
                                </p>

                                <div class="break-all rounded bg-green-100 p-2 text-xs dark:bg-green-900/50">
                                    <code>{{ $item['secure_token'] }}</code>
                                </div>

                                <a
                                    href="{{ $item['secure_url'] }}"
                                    class="inline-block rounded bg-green-600 px-4 py-2 text-white hover:bg-green-700"
                                >
                                    Test Secure Link
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="space-y-4 rounded-lg border border-blue-200 bg-blue-50 p-4 dark:border-blue-800 dark:bg-blue-900/30">
                <h3 class="font-semibold text-blue-900 dark:text-blue-200">Vulnerability Demonstrations</h3>
                <ul class="space-y-2 text-sm text-blue-800 dark:text-blue-300">
                    <li>✗ <strong>Token Reuse:</strong> Use the vulnerable token multiple times</li>
                    <li>✗ <strong>Token Mixing:</strong> Try using one user's vulnerable token to reset another user's password</li>
                    <li>✗ <strong>No Expiration:</strong> The vulnerable token never expires</li>
                    <li>✓ <strong>Secure:</strong> The secure token expires in 1 hour and can only be used once</li>
                </ul>
            </div>
        </div>
    </div>
</div>
