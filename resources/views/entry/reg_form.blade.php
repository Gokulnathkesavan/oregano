<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Oregano - Win a Trip to Italy!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{ asset('assets/images/logo/Oregano Logo_English_page-0001.jpg') }}" type="image/x-icon">
<link rel="shortcut icon" href="{{ asset('assets/images/logo/Oregano Logo_English_page-0001.jpg') }}" type="image/x-icon">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['Playfair Display', 'serif'],
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: '#7B242C',
                        brandLight: 'rgba(123, 36, 44, 0.1)',
                        brandDark: '#671A22',
                        accent: '#D4AF37',
                        success: '#10B981',
                        error: '#EF4444',
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.6s ease-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'float': 'float 3s ease-in-out infinite',
                        'pulse-soft': 'pulseSoft 2s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' }
                        },
                        pulseSoft: {
                            '0%, 100%': { opacity: '1' },
                            '50%': { opacity: '0.8' }
                        }
                    },
                    boxShadow: {
                        'elegant': '0 10px 40px -10px rgba(123, 36, 44, 0.2)',
                        'soft': '0 4px 20px -2px rgba(0, 0, 0, 0.1)',
                    }
                },
            },
        };
    </script>
</head>

<body class="bg-gradient-to-br from-orange-50 via-red-50 to-yellow-50 min-h-screen font-sans">
    <!-- Background decoration -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-brand/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-accent/10 rounded-full blur-3xl"></div>
    </div>

    <div class="relative container mx-auto px-4 py-8">
        <div class="max-w-lg mx-auto">
            <!-- Header with logo -->
            <div class="text-center mb-8 animate-fade-in">
                <div
                    class="w-20 h-20 bg-brand rounded-full mx-auto mb-4 flex items-center justify-center shadow-elegant">
                    <img src="{{ asset('assets/images/logo/Oregano Logo_English_page-0001.jpg') }}" alt="Oregano Logo"
                        class="w-12 h-12 object-contain" />
                </div>
                <h1 class="font-heading text-3xl font-bold text-gray-800 mb-2">Welcome to Oregano</h1>
                <p class="text-gray-600 text-lg">An authentic Italian experience awaits</p>
            </div>


            <!-- Main card -->
            <div
                class="bg-white/70 backdrop-blur-sm rounded-3xl shadow-elegant overflow-hidden animate-slide-up border border-white/20">
                <!-- Hero banner -->
                <div class="relative h-72 bg-gradient-to-br from-brand via-brandDark to-red-900 overflow-hidden">
                    <!-- Placeholder for Italian coastal image -->
                    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg xmlns=" http://www.w3.org/2000/svg"
                        viewBox="0 0 100 100" %3E%3Cdefs%3E%3Cpattern id="grain" width="100" height="100"
                        patternUnits="userSpaceOnUse" %3E%3Ccircle cx="10" cy="10" r="1" fill="%23ffffff" opacity="0.1"
                        /%3E%3Ccircle cx="30" cy="30" r="0.5" fill="%23ffffff" opacity="0.15" /%3E%3Ccircle cx="70"
                        cy="20" r="0.8" fill="%23ffffff" opacity="0.1" /%3E%3Ccircle cx="90" cy="80" r="1.2"
                        fill="%23ffffff" opacity="0.05" /%3E%3C/pattern%3E%3C/defs%3E%3Crect width="100" height="100"
                        fill="url(%23grain)" /%3E%3C/svg%3E')] opacity-30"></div>

                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                    <!-- Floating elements -->
                    <div class="absolute top-8 left-8 w-16 h-16 bg-white/10 rounded-full animate-float"></div>
                    <div class="absolute top-16 right-12 w-8 h-8 bg-accent/20 rounded-full animate-float"
                        style="animation-delay: 1s;"></div>
                    <div class="absolute bottom-20 left-12 w-12 h-12 bg-white/5 rounded-full animate-float"
                        style="animation-delay: 2s;"></div>

                    <!-- Content overlay -->
                    <div class="absolute inset-0 flex items-end">
                        <div class="p-8 text-white">
                            <div
                                class="inline-flex items-center bg-accent/90 text-brandDark px-4 py-2 rounded-full text-sm font-semibold mb-4 animate-pulse-soft">
                                Limited Time Contest
                            </div>
                            <h2 class="font-heading text-3xl font-bold mb-3 leading-tight">
                                Win 2 Round Trip Tickets to Liguria, Italy!
                            </h2>
                            <p class="text-white/90 text-lg font-medium">
                                Experience the authentic taste of our homeland
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Form section -->
                <div class="p-8" id="formContainer">
                    <!-- Entry instructions -->
                    <div class="bg-gradient-to-r from-brand/5 to-accent/5 rounded-2xl p-6 mb-8 border border-brand/10">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-10 h-10 bg-brand rounded-full flex items-center justify-center">
                                <span class="text-white font-bold">!</span>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-800 mb-2">How to Enter</h3>
                                <p class="text-gray-600 text-sm leading-relaxed">
                                    Fill out the form below with your details and upload your bill to enter the raffle.
                                    <span class="font-medium text-brand">No physical submission is required.</span>
                                </p>

                            </div>
                        </div>
                    </div>


                    
            @if(!empty($inactive) && $inactive)
                <!-- Inactive message -->
                <div class="p-6 text-center text-red-600 font-semibold">
                    <p>This outlet is currently inactive and not accepting entries.</p>
                </div>
            @else

                    <form id="raffleForm" class="space-y-6" action="{{ route('entries.store') }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="outlet_id" value="{{ $outlet->id }}" />
                        <!-- Name field -->
                        <div class="group">
                            <label for="name"
                                class="block text-gray-700 font-semibold mb-3 text-sm uppercase tracking-wide">
                                Full Name *
                            </label>
                            <div class="relative">
                                <input type="text" id="name" name="name" required
                                    class="w-full px-6 py-4 rounded-2xl border-2 border-gray-200 focus:border-brand focus:outline-none transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-800 placeholder-gray-400 group-hover:border-gray-300"
                                    placeholder="Mario Rossi" />
                                <div class="absolute inset-y-0 right-0 flex items-center pr-6">
                                    <div
                                        class="w-2 h-2 rounded-full bg-brand opacity-0 group-focus-within:opacity-100 transition-opacity duration-300">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email field -->
                        <div class="group">
                            <label for="email"
                                class="block text-gray-700 font-semibold mb-3 text-sm uppercase tracking-wide">
                                Email Address *
                            </label>
                            <div class="relative">
                                <input type="email" id="email" name="email" required
                                    class="w-full px-6 py-4 rounded-2xl border-2 border-gray-200 focus:border-brand focus:outline-none transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-800 placeholder-gray-400 group-hover:border-gray-300"
                                    placeholder="mario@example.com" />
                                <div class="absolute inset-y-0 right-0 flex items-center pr-6">
                                    <div
                                        class="w-2 h-2 rounded-full bg-brand opacity-0 group-focus-within:opacity-100 transition-opacity duration-300">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile field -->
                        <div class="group">
                            <label for="mobile"
                                class="block text-gray-700 font-semibold mb-3 text-sm uppercase tracking-wide">
                                Mobile Number *
                            </label>
                            <div class="relative">
                                <input type="tel" id="mobile" name="mobile" required
                                    class="w-full px-6 py-4 rounded-2xl border-2 border-gray-200 focus:border-brand focus:outline-none transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-800 placeholder-gray-400 group-hover:border-gray-300"
                                    placeholder="+39 123 456 7890" />
                                <div class="absolute inset-y-0 right-0 flex items-center pr-6">
                                    <div
                                        class="w-2 h-2 rounded-full bg-brand opacity-0 group-focus-within:opacity-100 transition-opacity duration-300">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bill number field -->
                        <div class="group">
                            <label for="bill_number"
                                class="block text-gray-700 font-semibold mb-3 text-sm uppercase tracking-wide">
                                Bill Number *
                            </label>
                            <div class="relative">
                                <input type="text" id="bill_number" name="bill_number" required
                                    class="w-full px-6 py-4 rounded-2xl border-2 border-gray-200 focus:border-brand focus:outline-none transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-800 placeholder-gray-400 group-hover:border-gray-300"
                                    placeholder="Enter your bill number" />
                                <div class="absolute inset-y-0 right-0 flex items-center pr-6">
                                    <div
                                        class="w-2 h-2 rounded-full bg-brand opacity-0 group-focus-within:opacity-100 transition-opacity duration-300">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- File upload field -->
                        <div class="group">
                            <label for="bill_image"
                                class="block text-gray-700 font-semibold mb-3 text-sm uppercase tracking-wide">
                                Upload Bill Image *
                            </label>
                            <div class="relative">
                                <input type="file" id="bill_image" name="bill_image" accept="image/*" required
                                    class="hidden" />
                                <div id="fileUploadArea"
                                    class="w-full px-6 py-8 rounded-2xl border-2 border-dashed border-gray-300 hover:border-brand transition-all duration-300 bg-white/30 backdrop-blur-sm cursor-pointer group-hover:bg-white/50">
                                    <div class="text-center">
                                        <div
                                            class="w-16 h-16 bg-brand/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                            <svg class="w-8 h-8 text-brand" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-600 font-medium mb-2">Click to upload your bill</p>
                                        <p class="text-gray-500 text-sm">PNG, JPG up to 10MB</p>
                                    </div>
                                </div>
                                <div id="filePreview"
                                    class="hidden mt-4 p-4 bg-green-50 rounded-xl border border-green-200">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-success rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-success font-semibold" id="fileName">File uploaded
                                                successfully</p>
                                            <p class="text-success/70 text-sm">Ready to submit</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Terms checkbox -->
                        <div class="flex items-start space-x-4 p-6 bg-gray-50/50 rounded-2xl border border-gray-200">
                            <input id="terms" name="terms" type="checkbox" required
                                class="mt-1 h-5 w-5 text-brand border-2 border-gray-300 rounded focus:ring-brand focus:ring-2 focus:ring-offset-2 transition-all duration-200" />
                            <label for="terms" class="text-gray-700 leading-relaxed">
                                I agree to the
                                <a href="#"
                                    class="text-brand font-semibold hover:text-brandDark underline decoration-brand/30 hover:decoration-brand transition-all duration-200">Terms
                                    & Conditions</a>
                                and
                                <a href="#"
                                    class="text-brand font-semibold hover:text-brandDark underline decoration-brand/30 hover:decoration-brand transition-all duration-200">Privacy
                                    Policy</a>
                            </label>
                        </div>

                        <!-- Submit button -->
                        <button id="submitBtn" type="submit"
                            class="w-full bg-gradient-to-r from-brand to-brandDark text-white py-5 px-8 rounded-2xl font-bold text-lg hover:from-brandDark hover:to-brand transition-all duration-300 shadow-elegant hover:shadow-xl hover:-translate-y-1 flex items-center justify-center space-x-3 group">
                            <span>Submit My Entry</span>
                            <svg class="w-6 h-6 group-hover:translate-x-1 transition-transform duration-300" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </button>
                    </form>

                    @endif

                    <!-- Privacy note -->
                    <div class="mt-8 text-center">
                        <div class="inline-flex items-center space-x-2 text-gray-500 text-sm">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                                </path>
                            </svg>
                            <span>Your information is secure and will not be shared</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-8 text-gray-500 animate-fade-in">
                <p class="text-sm">© 2025 Oregano Restaurant. Made with ❤️ in Italy</p>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center hidden z-50 p-4">
        <div class="bg-white rounded-3xl shadow-elegant max-w-md w-full overflow-hidden animate-slide-up">
            <div class="bg-gradient-to-r from-success to-green-600 p-8 text-center text-white">
                <div class="w-20 h-20 bg-white/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2">Grazie Mille!</h3>
                <p class="text-white/90">Your entry has been submitted successfully</p>
            </div>
            <div class="p-8 text-center">
                <p class="text-gray-600 mb-6">Don't forget to drop your physical entry in our Draw Box at the restaurant
                    to complete your submission!</p>
                <button id="closeSuccessModal"
                    class="bg-brand text-white px-8 py-3 rounded-xl font-semibold hover:bg-brandDark transition-colors">
                    Close
                </button>
            </div>
        </div>
    </div>

    <!-- Error Modal -->
    <div id="errorModal"
        class="fixed inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center hidden z-50 p-4">
        <div class="bg-white rounded-3xl shadow-elegant max-w-md w-full overflow-hidden animate-slide-up">
            <div class="bg-gradient-to-r from-error to-red-600 p-8 text-center text-white">
                <div class="w-20 h-20 bg-white/20 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-2">Submission Error</h3>
                <p class="text-white/90">Please check your information and try again</p>
            </div>
            <div class="p-8">
                <p id="errorMessage" class="text-gray-700 mb-6 text-center"></p>
                <div class="text-center">
                    <button id="closeErrorModal"
                        class="bg-brand text-white px-8 py-3 rounded-xl font-semibold hover:bg-brandDark transition-colors">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

 
    
    <!-- Updated Production-Ready Script -->
   <script>
    // File upload handling
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.getElementById('bill_image');
        const fileUploadArea = document.getElementById('fileUploadArea');
        const filePreview = document.getElementById('filePreview');
        const fileName = document.getElementById('fileName');

        if (fileUploadArea && fileInput) {
            fileUploadArea.addEventListener('click', () => fileInput.click());
        }

        if (fileInput) {
            fileInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    fileName.textContent = file.name.length > 25 ? 
                        file.name.substring(0, 22) + '...' : 
                        file.name;
                    filePreview?.classList.remove('hidden');
                    fileUploadArea?.classList.add('border-success', 'bg-success/5');
                }
            });
        }

        // Form submission
        const form = document.getElementById('raffleForm');
        const submitBtn = document.getElementById('submitBtn');
        const errorModal = document.getElementById('errorModal');
        const errorMessage = document.getElementById('errorMessage');
        const formContainer = document.getElementById('formContainer');
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

        if (form && csrfToken) {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Add loading state
                const originalContent = submitBtn.innerHTML;
                submitBtn.innerHTML = `
                    <svg class="animate-spin w-6 h-6" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Submitting...</span>
                `;
                submitBtn.disabled = true;

                try {
                    const formData = new FormData(form);
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json'
                        },
                        body: formData
                    });

                    const data = await response.json();

                    if (!response.ok) {
                        throw new Error(
                            data.message || 
                            (data.errors ? Object.values(data.errors).flat().join('\n') : 'Submission failed')
                        );
                    }

                    // Success - replace form with thank you message
                    if (formContainer) {
                        formContainer.innerHTML = `
                            <div class="text-center py-12 animate-fade-in">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-green-500 mx-auto mb-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <h3 class="text-3xl font-bold text-gray-800 mb-4 font-heading">Thank You!</h3>
                                <p class="text-gray-600 text-lg mb-6">Your entry has been submitted successfully.</p>
                                <p class="text-gray-500 text-sm">Don't forget to drop your physical entry in our Draw Box at the restaurant to complete your submission!</p>
                            </div>
                        `;
                    }
                } catch (error) {
                    console.error('Submission error:', error);
                    if (errorMessage) {
                        errorMessage.textContent = error.message || 'An unexpected error occurred. Please try again.';
                    }
                    if (errorModal) {
                        errorModal.classList.remove('hidden');
                    }
                } finally {
                    if (submitBtn) {
                        submitBtn.innerHTML = originalContent;
                        submitBtn.disabled = false;
                    }
                }
            });
        }

        // Modal handlers
        const closeErrorModal = document.getElementById('closeErrorModal');
        if (closeErrorModal && errorModal) {
            closeErrorModal.addEventListener('click', () => {
                errorModal.classList.add('hidden');
            });
        }

        // Add smooth focus transitions
        const inputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="tel"]');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement?.classList.add('scale-105');
            });
            input.addEventListener('blur', () => {
                input.parentElement?.classList.remove('scale-105');
            });
        });
    });
</script>

</body>

</html>