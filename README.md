# Dynamic Donations

Empowering children's homes with efficient donation management.

![Dynamic Donations Logo](public/logo/dynamic_donations_logo.png)

## Table of Contents

- [About The Project](#about-the-project)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)
- [Acknowledgments](#acknowledgments)

## About The Project

Dynamic Donations is a comprehensive donation management system designed specifically for children's homes, with a focus on enhancing the donation process, improving donor engagement, and ensuring financial transparency. Our platform is tailored to meet the needs of Thomas Barnados, streamlining administrative tasks to allow more focus on the core mission of caring for children.

**Key Features:**

* Efficient tracking of monetary and in-kind donations.
* Detailed donor profiles with donation history.
* Automated receipt generation and thank-you emails.
* Custom reporting tools for financial oversight.
* Integration with PayPal for secure payment processing.
* Event planning and volunteer coordination modules.

![Dynamic Donations Screen Shot](https://example.com)

### Built With

* [![Laravel][Laravel.com]][Laravel-url]
* [![Livewire][Livewire.com]][Livewire-url]
* [![Tailwind][Tailwindcss.com]][Tailwind-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]
* [![DaisyUI][DaisyUI.com]][DaisyUI-url]

## Getting Started

To set up a local copy of Dynamic Donations, follow these simple steps.

### Prerequisites

Ensure you have the following installed:

* PHP 8.1 or higher
* Composer
* Node.js and npm
* MySQL

### Installation

1. Clone the repository:
   ```sh
   git clone https://github.com/Wendy-Lagho/dynamic_donations.git
   ```
2. Install PHP dependencies:
   ```sh
   composer install
   ```
3. Install Node.js dependencies:
   ```sh
   npm install
   ```
4. Create a new MySQL database and update the `.env` file with the database credentials.

5. Generate key:
   ```sh
   php artisan key:generate
   ```
5. Run the database migrations:
   ```sh
   php artisan migrate
   ```
6. Start the development server:
   ```sh
   php artisan serve
   ```
   _And that's it!_

You now have a local development environment running for Dynamic Donations. Access the application through the URL provided by the `php artisan serve` command, typically `http://localhost:8000`. Explore the features, manage donations, and customize the platform as per your organization's needs.

## Usage

With Dynamic Donations up and running, you can:

- **Manage Donations:** Track and manage both monetary and in-kind donations efficiently.
- **Engage Donors:** Utilize the platform to create detailed donor profiles, send automated thank-you emails, and generate donation receipts.
- **Report and Analyze:** Access custom reporting tools for financial oversight and better decision-making.
- **Plan Events:** Organize and coordinate events and volunteer activities directly through the platform.

For a more detailed guide on how to use each feature, refer to the [User Manual](https://github.com/Wendy-Lagho/dynamic_donations/wiki).


## Contributing

We encourage contributions from everyone! If you'd like to contribute, please follow these steps:

1. Fork the project.
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`).
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`).
4. Push to the Branch (`git push origin feature/AmazingFeature`).
5. Open a Pull Request.

Please ensure your pull request adheres to the project's coding standards and guidelines.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details.

## Contact

For any questions or suggestions, please reach out to us at:

- Wendy Lagho - [@Wendy-Lagho](https://github.com/Wendy-Lagho) - wlagho@gmail.com
- Project Link: [https://github.com/Wendy-Lagho/dynamic-donations](https://github.com/Wendy-Lagho/dynamic-donations)
- Issue Tracker: [https://github.com/Wendy-Lagho/dynamic-donations/issues](https://github.com/Wendy-Lagho/dynamic-donations/issues)

We look forward to hearing from you!

## Acknowledgments

A special thank you to everyone who has contributed to the project, provided feedback, and supported us along the way. Your contributions make all the difference.


