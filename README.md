# Branighan Group

Welcome to Branighan Group's real estate and home design project. This project is dedicated to showcasing properties and home designs in Kenya. This documentation provides an overview of the project structure, features, and instructions for setting up and running the project.

## Table of Contents

1. [Project Overview](#project-overview)
2. [Features](#features)
3. [Technologies Used](#technologies-used)
4. [Setup and Installation](#setup-and-installation)
5. [Usage](#usage)
6. [File Structure](#file-structure)
7. [Contributing](#contributing)
8. [License](#license)

## Project Overview

Branighan Group is a web application designed to provide users with information on real estate properties and home designs in Kenya. The application features a responsive design with both light and dark themes, making it easy for users to navigate and find the information they need.

## Features

- **Responsive Design:** Compatible with both mobile and desktop browsers.
- **Light/Dark Theme Toggle:** Users can switch between light and dark themes.
- **Dynamic Content:** Displays information about properties, designs, and company information.
- **User Profile:** Displays a user profile with the name and profile picture.
- **Side Navigation Menu:** Accessible menu for easy navigation on mobile devices.

## Technologies Used

- **CodeIgniter 4 (CI4):** Backend framework
- **HTML:** Markup language for creating the structure of the web pages.
- **CSS:** Styling for the web pages, including themes and layout.
- **JavaScript:** Interactive features and theme toggling.
- **Git:** Version control system for tracking changes.

## Setup and Installation

To set up and run this project locally, follow these steps:

1. **Clone the Repository:**

   ```sh
   git clone https://github.com/GodyRacks/BG.git
## Setup and Installation

To set up and run this project locally, follow these steps:

1. **Navigate to the Project Directory:**

    ```sh
    cd BG
    ```

2. **Install Dependencies:**

    Ensure you have Composer installed, then run:

    ```sh
    composer install
    ```

3. **Set Up Environment Variables:**

    Copy the `.env.example` file to `.env` and configure the necessary settings:

    ```sh
    cp .env.example .env
    ```

4. **Run the Application:**

    Start the local development server:

    ```sh
    php spark serve
    ```

    Navigate to `http://localhost:8080` in your web browser to see the project in action.

## Usage

- **Theme Toggle:** Click the theme toggle switch in the navigation bar to switch between light and dark themes.
- **Navigation:** Use the navigation links to explore different sections such as Houses in Kenya, Designs, About, Contact, Blog, and FAQs.
- **User Profile:** View the user profile information in the navigation bar.

## File Structure

```plaintext
BG/
├── .git/                   # Git directory
├── .gitignore              # Git ignore file
├── README.md               # Project documentation
├── app/                    # CodeIgniter application directory
├── public/                 # Publicly accessible files
│   ├── apple-touch-icon.png
│   ├── favicon-16x16.png
│   ├── favicon-32x32.png
│   ├── favicon.ico
│   ├── index.html          # Main HTML file
│   ├── logo_dark.png       # Dark mode logo
│   ├── logo_light.png      # Light mode logo
│   ├── scripts/            # JavaScript files
│   │   └── scripts.js      # Main JavaScript file
│   ├── site.webmanifest    # Web manifest file
│   └── styles/             # CSS files
│       └── styles.css      # Main CSS file
└── composer.json           # Composer dependencies
## Contributing

Contributions are welcome! If you would like to contribute to this project, please follow these steps:

### Fork the Repository:

Click the "Fork" button at the top right of this page to create a copy of the repository under your GitHub account.

### Clone Your Fork:

```sh
git clone https://github.com/GodyRacks/BG.git
```
## License
This project is licensed under the MIT License. See the LICENSE file for details.
