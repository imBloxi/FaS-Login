<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Step Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .step {
            display: none;
        }

        .step.active {
            display: block;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-800">
    <div class="container mx-auto py-12">
        <h1 class="text-3xl font-semibold text-center mb-8">Multi-Step Form</h1>
        <div class="max-w-lg mx-auto">
            <form action="process.php" method="POST" class="space-y-6" id="multi-step-form">
                <!-- Step 1: Personal Info -->
                <div class="step active">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <button type="button" onclick="nextStep(this)" data-next-step="account-info"
                        class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Next</button>
                </div>
                <!-- Step 2: Account Info -->
                <div class="step" id="account-info">
                    <label for="username"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Username</label>
                    <input type="text" id="username" name="username"
                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <label for="password"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-4">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <button type="button" onclick="prevStep(this)" data-prev-step="personal-info"
                        class="mt-4 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Previous</button>
                    <button type="button" onclick="nextStep(this)" data-next-step="confirmation"
                        class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Next</button>
                </div>
                <!-- Step 3: Confirmation -->
                <div class="step" id="confirmation">
                    <p class="text-lg font-semibold mb-4">Confirmation</p>
                    <p>Name: <span id="confirm-name"></span></p>
                    <p>Username: <span id="confirm-username"></span></p>
                    <button type="button" onclick="prevStep(this)" data-prev-step="account-info"
                        class="mt-4 inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Previous</button>
                    <button type="submit"
                        class="mt-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function nextStep(button) {
            const currentStep = button.closest('.step');
            const nextStepId = button.getAttribute('data-next-step');
            const nextStep = document.getElementById(nextStepId);

            currentStep.classList.remove('active');
            nextStep.classList.add('active');
        }

        function prevStep(button) {
            const currentStep = button.closest('.step');
            const prevStepId = button.getAttribute('data-prev-step');
            const prevStep = document.getElementById(prevStepId);

            currentStep.classList.remove('active');
            prevStep.classList.add('active');
        }

        document.addEventListener("DOMContentLoaded", function () {
            const form = document.getElementById('multi-step-form');

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                const name = document.getElementById('name').value;
                const username = document.getElementById('username').value;

                document.getElementById('confirm-name').innerText = name;
                document.getElementById('confirm-username').innerText = username;

                const currentStep = document.querySelector('.step.active');
                const nextStepId = currentStep.getAttribute('id');

                // For demonstration purposes
                alert('Form submitted successfully!');

                // You can redirect to another page or do other actions here
            });
        });
    </script>
</body>

</html>
