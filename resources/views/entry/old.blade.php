<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Oregano</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo/Oregano Logo_English_page-0001.jpg') }}" />
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Playfair Display', 'serif'],
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        brand: 'rgb(123, 36, 44)',
                        brandLight: 'rgba(123, 36, 44, 0.1)',
                        brandDark: 'rgb(103, 26, 34)',
                    },
                },
            },
        };
    </script>
</head>

<body class="bg-gray-50 min-h-screen font-sans">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Banner -->
            <div class="w-full h-64 bg-gray-200 overflow-hidden relative">
                <img src="{{ asset('assets/images/Enter & win - Card_page-0001.jpg') }}" alt="Italian Coastal View"
                    class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
            </div>

            <!-- Prize -->
            <div class="py-6 px-6 text-center">
                <p class="text-lg font-semibold text-brand">
                    Win 2 round trip tickets to our Home in Italy (Liguria)!
                </p>
                <p class="text-gray-600 mt-2 italic">
                    Drop your entry in the Draw Box!
                </p>
            </div>

            @if(!empty($inactive) && $inactive)
                <!-- Inactive message -->
                <div class="p-6 text-center text-red-600 font-semibold">
                    <p>This outlet is currently inactive and not accepting entries.</p>
                </div>
            @else
                <!-- Form and Thank You message container -->
                <div class="px-6 pb-8" id="formContainer">
                    <form id="raffleForm" action="{{ route('entries.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Hidden outlet_id -->
                        <input type="hidden" name="outlet_id" value="{{ $outlet->id }}" />

                        <div class="mb-6">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand transition"
                                placeholder="Mario Rossi" required />
                        </div>

                        <div class="mb-6">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand transition"
                                placeholder="mario@example.com" required />
                        </div>

                        <div class="mb-6">
                            <label for="mobile" class="block text-gray-700 font-medium mb-2">Mobile Number</label>
                            <input type="tel" id="mobile" name="mobile"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand transition"
                                placeholder="+39 123 456 7890" required />
                        </div>

                        <!-- New: Bill Number -->
                        <div class="mb-6">
                            <label for="bill_number" class="block text-gray-700 font-medium mb-2">Bill Number</label>
                            <input type="text" id="bill_number" name="bill_number"
                                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-brand transition"
                                placeholder="Enter your bill number" required />
                        </div>

                        <!-- New: Bill Image Upload -->
                        <div class="mb-6">
                            <label for="bill_image" class="block text-gray-700 font-medium mb-2">Upload Bill Image</label>
                            <input type="file" id="bill_image" name="bill_image" accept="image/*" class="w-full text-gray-700 file:mr-4 file:py-2 file:px-4
                       file:rounded-lg file:border-0
                       file:text-sm file:font-semibold
                       file:bg-brand file:text-white
                       hover:file:bg-brandDark" required />
                        </div>

                        <div class="mb-8">
                            <div class="flex items-start">
                                <input id="terms" name="terms" type="checkbox"
                                    class="focus:ring-brand h-4 w-4 text-brand border-gray-300 rounded" required />
                                <label for="terms" class="ml-3 text-sm text-gray-700">
                                    I agree to the
                                    <a href="#" class="text-brand font-medium hover:underline">Terms & Conditions</a>
                                    and
                                    <a href="#" class="text-brand font-medium hover:underline">Privacy Policy</a>
                                </label>
                            </div>
                        </div>

                        <button id="submitBtn" type="submit"
                            class="w-full bg-brand text-white py-3 px-4 rounded-lg font-medium hover:bg-brandDark transition shadow-lg hover:shadow-xl flex items-center justify-center">
                            Submit My Entry
                        </button>
                    </form>


                    <div class="mt-6 text-center text-sm text-gray-500">
                        We respect your privacy. Your information will not be shared.
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Error Modal -->
<div id="errorModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden z-50">
  <div class="bg-white rounded-xl shadow-lg max-w-md w-full p-6 relative">
    <h3 class="text-xl font-bold text-red-600 mb-4">Submission Error</h3>
    <p id="errorMessage" class="text-gray-700 mb-6"></p>
    <div class="text-right">
      <button id="closeErrorModal" class="bg-brand text-white px-4 py-2 rounded-lg hover:bg-brandDark transition">
        Close
      </button>
    </div>
  </div>
</div>


    <script>
    const form = document.getElementById('raffleForm');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const url = form.action;
            const formData = new FormData(form);

            fetch(url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                    Accept: 'application/json',
                },
                body: formData,
            })
                .then((response) => {
                    if (!response.ok) throw response;
                    return response.json(); 
                })
                .then((data) => {
                    // Replace form with thank you message
                    const container = document.getElementById('formContainer');
                    container.innerHTML = `
                        <div class="text-center py-12">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-green-500 mx-auto mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h3 class="text-3xl font-bold text-gray-800 mb-4">Thank You!</h3>
                            <p class="text-gray-600 text-lg">Your entry has been submitted successfully.</p>
                        </div>
                    `;
                })
                .catch(async (errorResponse) => {
                    let message = 'An unexpected error occurred.';
                    if (errorResponse.json) {
                        const errorData = await errorResponse.json();
                        if (errorData.errors) {
                            message = Object.values(errorData.errors).flat().join('\n');
                        } else if (errorData.message) {
                            message = errorData.message;
                        }
                    }

                    // Show modal instead of alert
                    document.getElementById('errorMessage').innerText = message;
                    document.getElementById('errorModal').classList.remove('hidden');
                });
        });
    }

    // Close modal button
    document.getElementById('closeErrorModal').addEventListener('click', () => {
        document.getElementById('errorModal').classList.add('hidden');
    });
</script>

</body>

</html>