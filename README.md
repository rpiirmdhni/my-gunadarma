<p align="center">
    <img src="https://raw.githubusercontent.com/rpiirmdhni/my-gunadarma/refs/heads/main/public/img/MyGunadarma.png" align="center" width="60%">
</p>
<p align="center"><h1 align="center">My Gunadarma</h1></p>
<p align="center">
	<img src="https://img.shields.io/github/license/rpiirmdhni/my-gunadarma?style=default&logo=opensourceinitiative&logoColor=white&color=0080ff" alt="license">
	<img src="https://img.shields.io/github/last-commit/rpiirmdhni/my-gunadarma?style=default&logo=git&logoColor=white&color=0080ff" alt="last-commit">
	<img src="https://img.shields.io/github/languages/top/rpiirmdhni/my-gunadarma?style=default&color=0080ff" alt="repo-top-language">
	<img src="https://img.shields.io/github/languages/count/rpiirmdhni/my-gunadarma?style=default&color=0080ff" alt="repo-language-count">
</p>
<p align="center"><!-- default option, no dependency badges. -->
</p>
<p align="center">
</p>
<br>

## 🔗 Quick Links

- [📍 Overview](#-overview)
- [👾 Features](#-features)
- [📁 Project Structure](#-project-structure)
  - [📂 Project Index](#-project-index)
- [🚀 Getting Started](#-getting-started)
  - [☑️ Prerequisites](#-prerequisites)
  - [⚙️ Installation](#-installation)
  - [🤖 Usage](#🤖-usage)
- [🔰 Contributing](#-contributing)
- [🎗 License](#-license)
- [🙌 Acknowledgments](#-acknowledgments)

---

## 📍 Overview

The MyGunadarma application is a web project developed by Kelompok 4 as part of the Midterm Assignment and Exam assessment for the course Konsep Sistem dan Teknologi Sistem Informasi (KSTSI) C at [Gunadarma University](https://gunadarma.ac.id).
This project is designed to provide experience in developing modern web applications using PHP, Blade, Tailwind, and Vite technologies.

This repository is open-source and can be used as a reference or for further development by students or other developers interested in web-based information system implementation.

---

## 👾 Features

- **Student Attendance** – QR-Based, a Unique QR Code for each Student.
- **E-library** – Integrated with the [Gutenberg Project](https://www.gutenberg.org/).
- **ToDo List** – Productivity Features for All Users.
- **Admin Features** – Class, Major, Student, Lecturer, and User Management.

---

## 📁 Project Structure

```sh
└── my-gunadarma/
    ├── README.md
    ├── app
    │   ├── Console
    │   ├── Exceptions
    │   ├── Http
    │   ├── Models
    │   ├── Providers
    │   └── View
    ├── artisan
    ├── bootstrap
    │   ├── app.php
    │   └── cache
    ├── composer.json
    ├── composer.lock
    ├── config
    │   ├── app.php
    │   ├── auth.php
    │   ├── broadcasting.php
    │   ├── cache.php
    │   ├── cors.php
    │   ├── database.php
    │   ├── filesystems.php
    │   ├── hashing.php
    │   ├── logging.php
    │   ├── mail.php
    │   ├── queue.php
    │   ├── sanctum.php
    │   ├── services.php
    │   ├── session.php
    │   └── view.php
    ├── database
    │   ├── .gitignore
    │   ├── factories
    │   ├── migrations
    │   └── seeders
    ├── package-lock.json
    ├── package.json
    ├── phpunit.xml
    ├── postcss.config.js
    ├── public
    │   ├── .htaccess
    │   ├── favicon.ico
    │   ├── img
    │   ├── index.php
    │   └── robots.txt
    ├── resources
    │   ├── css
    │   ├── js
    │   └── views
    ├── routes
    │   ├── api.php
    │   ├── auth.php
    │   ├── channels.php
    │   ├── console.php
    │   └── web.php
    ├── storage
    │   ├── app
    │   ├── framework
    │   └── logs
    ├── tailwind.config.js
    ├── tests
    │   ├── CreatesApplication.php
    │   ├── Feature
    │   ├── TestCase.php
    │   └── Unit
    └── vite.config.js
```


### 📂 Project Index
<details open>
	<summary><b><code>MY-GUNADARMA/</code></b></summary>
	<details> <!-- __root__ Submodule -->
		<summary><b>__root__</b></summary>
		<blockquote>
			<table>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/postcss.config.js'>postcss.config.js</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/package-lock.json'>package-lock.json</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/artisan'>artisan</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/tailwind.config.js'>tailwind.config.js</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/composer.json'>composer.json</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/vite.config.js'>vite.config.js</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/package.json'>package.json</a></b></td>
			</tr>
			</table>
		</blockquote>
	</details>
	<details> <!-- bootstrap Submodule -->
		<summary><b>bootstrap</b></summary>
		<blockquote>
			<table>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/bootstrap/app.php'>app.php</a></b></td>
			</tr>
			</table>
		</blockquote>
	</details>
	<details> <!-- config Submodule -->
		<summary><b>config</b></summary>
		<blockquote>
			<table>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/filesystems.php'>filesystems.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/logging.php'>logging.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/auth.php'>auth.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/sanctum.php'>sanctum.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/hashing.php'>hashing.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/cors.php'>cors.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/mail.php'>mail.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/session.php'>session.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/cache.php'>cache.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/services.php'>services.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/view.php'>view.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/broadcasting.php'>broadcasting.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/app.php'>app.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/queue.php'>queue.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/config/database.php'>database.php</a></b></td>
			</tr>
			</table>
		</blockquote>
	</details>
	<details> <!-- resources Submodule -->
		<summary><b>resources</b></summary>
		<blockquote>
			<details>
				<summary><b>css</b></summary>
				<blockquote>
					<table>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/css/app.css'>app.css</a></b></td>
					</tr>
					</table>
				</blockquote>
			</details>
			<details>
				<summary><b>js</b></summary>
				<blockquote>
					<table>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/js/app.js'>app.js</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/js/bootstrap.js'>bootstrap.js</a></b></td>
					</tr>
					</table>
				</blockquote>
			</details>
			<details>
				<summary><b>views</b></summary>
				<blockquote>
					<table>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/old.dashboard.blade.php'>old.dashboard.blade.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/todolist-old.blade.php'>todolist-old.blade.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/todolist.blade.php'>todolist.blade.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/dashboard.blade.php'>dashboard.blade.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/welcome.blade.php'>welcome.blade.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/dashboard-old.blade.php'>dashboard-old.blade.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/welcome-old.blade.php'>welcome-old.blade.php</a></b></td>
					</tr>
					</table>
					<details>
						<summary><b>profile</b></summary>
						<blockquote>
							<table>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/profile/edit.blade.php'>edit.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/profile/edit-old.blade.php'>edit-old.blade.php</a></b></td>
							</tr>
							</table>
							<details>
								<summary><b>partials</b></summary>
								<blockquote>
									<table>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/profile/partials/delete-user-form.blade.php'>delete-user-form.blade.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/profile/partials/update-profile-information-form.blade.php'>update-profile-information-form.blade.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/profile/partials/update-password-form.blade.php'>update-password-form.blade.php</a></b></td>
									</tr>
									</table>
								</blockquote>
							</details>
						</blockquote>
					</details>
					<details>
						<summary><b>layouts</b></summary>
						<blockquote>
							<table>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/layouts/guest.blade.php'>guest.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/layouts/footnav-menu.blade.php'>footnav-menu.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/layouts/sidebar.blade.php'>sidebar.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/layouts/app.blade.php'>app.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/layouts/navbar.blade.php'>navbar.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/layouts/navigation.blade.php'>navigation.blade.php</a></b></td>
							</tr>
							</table>
						</blockquote>
					</details>
					<details>
						<summary><b>lecturer</b></summary>
						<blockquote>
							<details>
								<summary><b>attendances</b></summary>
								<blockquote>
									<table>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/lecturer/attendances/manage.blade.php'>manage.blade.php</a></b></td>
									</tr>
									</table>
								</blockquote>
							</details>
						</blockquote>
					</details>
					<details>
						<summary><b>components</b></summary>
						<blockquote>
							<table>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/secondary-button.blade.php'>secondary-button.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/auth-session-status.blade.php'>auth-session-status.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/dropdown.blade.php'>dropdown.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/application-logo.blade.php'>application-logo.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/danger-button.blade.php'>danger-button.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/nav-link.blade.php'>nav-link.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/modal.blade.php'>modal.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/responsive-nav-link.blade.php'>responsive-nav-link.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/dropdown-link.blade.php'>dropdown-link.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/show-password.blade.php'>show-password.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/input-label.blade.php'>input-label.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/primary-button.blade.php'>primary-button.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/text-input.blade.php'>text-input.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/components/input-error.blade.php'>input-error.blade.php</a></b></td>
							</tr>
							</table>
						</blockquote>
					</details>
					<details>
						<summary><b>attendances</b></summary>
						<blockquote>
							<table>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/attendances/scan.blade.php'>scan.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/attendances/scan-old.blade.php'>scan-old.blade.php</a></b></td>
							</tr>
							</table>
						</blockquote>
					</details>
					<details>
						<summary><b>e-library</b></summary>
						<blockquote>
							<table>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/e-library/index.blade.php'>index.blade.php</a></b></td>
							</tr>
							</table>
						</blockquote>
					</details>
					<details>
						<summary><b>auth</b></summary>
						<blockquote>
							<table>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/auth/reset-password.blade.php'>reset-password.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/auth/verify-email.blade.php'>verify-email.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/auth/register.blade.php'>register.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/auth/forgot-password.blade.php'>forgot-password.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/auth/login.blade.php'>login.blade.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/auth/confirm-password.blade.php'>confirm-password.blade.php</a></b></td>
							</tr>
							</table>
						</blockquote>
					</details>
					<details>
						<summary><b>admin</b></summary>
						<blockquote>
							<details>
								<summary><b>manage</b></summary>
								<blockquote>
									<table>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/admin/manage/employee.blade.php'>employee.blade.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/admin/manage/course-schedule.blade.php'>course-schedule.blade.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/admin/manage/student.blade.php'>student.blade.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/admin/manage/major.blade.php'>major.blade.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/admin/manage/course.blade.php'>course.blade.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/admin/manage/user.blade.php'>user.blade.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/admin/manage/lecturer.blade.php'>lecturer.blade.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/resources/views/admin/manage/classroom.blade.php'>classroom.blade.php</a></b></td>
									</tr>
									</table>
								</blockquote>
							</details>
						</blockquote>
					</details>
				</blockquote>
			</details>
		</blockquote>
	</details>
	<details> <!-- routes Submodule -->
		<summary><b>routes</b></summary>
		<blockquote>
			<table>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/routes/auth.php'>auth.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/routes/api.php'>api.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/routes/channels.php'>channels.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/routes/web.php'>web.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/routes/console.php'>console.php</a></b></td>
			</tr>
			</table>
		</blockquote>
	</details>
	<details> <!-- public Submodule -->
		<summary><b>public</b></summary>
		<blockquote>
			<table>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/public/.htaccess'>.htaccess</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/public/index.php'>index.php</a></b></td>
			</tr>
			<tr>
				<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/public/robots.txt'>robots.txt</a></b></td>
			</tr>
			</table>
		</blockquote>
	</details>
	<details> <!-- app Submodule -->
		<summary><b>app</b></summary>
		<blockquote>
			<details>
				<summary><b>Exceptions</b></summary>
				<blockquote>
					<table>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Exceptions/Handler.php'>Handler.php</a></b></td>
					</tr>
					</table>
				</blockquote>
			</details>
			<details>
				<summary><b>Models</b></summary>
				<blockquote>
					<table>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/attendances.php'>attendances.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/Books.php'>Books.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/User.php'>User.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/Courses_Schedule.php'>Courses_Schedule.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/todos.php'>todos.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/Student.php'>Student.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/Log.php'>Log.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/Lecturer.php'>Lecturer.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/Major.php'>Major.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/Classroom.php'>Classroom.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/Digibooks.php'>Digibooks.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/Reports.php'>Reports.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/Employee.php'>Employee.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Models/Courses.php'>Courses.php</a></b></td>
					</tr>
					</table>
				</blockquote>
			</details>
			<details>
				<summary><b>Http</b></summary>
				<blockquote>
					<table>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Kernel.php'>Kernel.php</a></b></td>
					</tr>
					</table>
					<details>
						<summary><b>Controllers</b></summary>
						<blockquote>
							<table>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/ProfileController.php'>ProfileController.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/DigibooksController.php'>DigibooksController.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/AttendanceController.php'>AttendanceController.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/Controller.php'>Controller.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/TodosController.php'>TodosController.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/AdminController.php'>AdminController.php</a></b></td>
							</tr>
							</table>
							<details>
								<summary><b>Auth</b></summary>
								<blockquote>
									<table>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/Auth/RegisteredUserController.php'>RegisteredUserController.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/Auth/ConfirmablePasswordController.php'>ConfirmablePasswordController.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/Auth/AuthenticatedSessionController.php'>AuthenticatedSessionController.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/Auth/NewPasswordController.php'>NewPasswordController.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/Auth/VerifyEmailController.php'>VerifyEmailController.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/Auth/PasswordResetLinkController.php'>PasswordResetLinkController.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/Auth/PasswordController.php'>PasswordController.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/Auth/EmailVerificationPromptController.php'>EmailVerificationPromptController.php</a></b></td>
									</tr>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Controllers/Auth/EmailVerificationNotificationController.php'>EmailVerificationNotificationController.php</a></b></td>
									</tr>
									</table>
								</blockquote>
							</details>
						</blockquote>
					</details>
					<details>
						<summary><b>Middleware</b></summary>
						<blockquote>
							<table>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Middleware/EncryptCookies.php'>EncryptCookies.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Middleware/TrustProxies.php'>TrustProxies.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Middleware/RedirectIfAuthenticated.php'>RedirectIfAuthenticated.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Middleware/VerifyCsrfToken.php'>VerifyCsrfToken.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Middleware/PreventRequestsDuringMaintenance.php'>PreventRequestsDuringMaintenance.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Middleware/Authenticate.php'>Authenticate.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Middleware/ValidateSignature.php'>ValidateSignature.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Middleware/TrimStrings.php'>TrimStrings.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Middleware/TrustHosts.php'>TrustHosts.php</a></b></td>
							</tr>
							</table>
						</blockquote>
					</details>
					<details>
						<summary><b>Requests</b></summary>
						<blockquote>
							<table>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Requests/ProfileUpdateRequest.php'>ProfileUpdateRequest.php</a></b></td>
							</tr>
							</table>
							<details>
								<summary><b>Auth</b></summary>
								<blockquote>
									<table>
									<tr>
										<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Http/Requests/Auth/LoginRequest.php'>LoginRequest.php</a></b></td>
									</tr>
									</table>
								</blockquote>
							</details>
						</blockquote>
					</details>
				</blockquote>
			</details>
			<details>
				<summary><b>View</b></summary>
				<blockquote>
					<details>
						<summary><b>Components</b></summary>
						<blockquote>
							<table>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/View/Components/GuestLayout.php'>GuestLayout.php</a></b></td>
							</tr>
							<tr>
								<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/View/Components/AppLayout.php'>AppLayout.php</a></b></td>
							</tr>
							</table>
						</blockquote>
					</details>
				</blockquote>
			</details>
			<details>
				<summary><b>Console</b></summary>
				<blockquote>
					<table>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Console/Kernel.php'>Kernel.php</a></b></td>
					</tr>
					</table>
				</blockquote>
			</details>
			<details>
				<summary><b>Providers</b></summary>
				<blockquote>
					<table>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Providers/RouteServiceProvider.php'>RouteServiceProvider.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Providers/AuthServiceProvider.php'>AuthServiceProvider.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Providers/AppServiceProvider.php'>AppServiceProvider.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Providers/EventServiceProvider.php'>EventServiceProvider.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/app/Providers/BroadcastServiceProvider.php'>BroadcastServiceProvider.php</a></b></td>
					</tr>
					</table>
				</blockquote>
			</details>
		</blockquote>
	</details>
	<details> <!-- database Submodule -->
		<summary><b>database</b></summary>
		<blockquote>
			<details>
				<summary><b>seeders</b></summary>
				<blockquote>
					<table>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/seeders/DatabaseSeeder.php'>DatabaseSeeder.php</a></b></td>
					</tr>
					</table>
				</blockquote>
			</details>
			<details>
				<summary><b>factories</b></summary>
				<blockquote>
					<table>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/factories/UserFactory.php'>UserFactory.php</a></b></td>
					</tr>
					</table>
				</blockquote>
			</details>
			<details>
				<summary><b>migrations</b></summary>
				<blockquote>
					<table>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2025_11_24_152902_create_logs_table.php'>2025_11_24_152902_create_logs_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2025_10_21_112041_create_students_table.php'>2025_10_21_112041_create_students_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2025_10_20_123800_create_majors_table.php'>2025_10_20_123800_create_majors_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2025_10_21_124556_create_employees_table.php'>2025_10_21_124556_create_employees_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2025_11_03_135345_create_attendances_table.php'>2025_11_03_135345_create_attendances_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2025_10_25_120026_create_courses__schedules_table.php'>2025_10_25_120026_create_courses__schedules_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2025_10_20_123925_create_classrooms_table.php'>2025_10_20_123925_create_classrooms_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2014_10_12_100000_create_password_reset_tokens_table.php'>2014_10_12_100000_create_password_reset_tokens_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2025_10_28_124433_create_todos_table.php'>2025_10_28_124433_create_todos_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2025_10_24_113547_create_courses_table.php'>2025_10_24_113547_create_courses_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2014_10_12_000000_create_users_table.php'>2014_10_12_000000_create_users_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2025_10_21_124154_create_lecturers_table.php'>2025_10_21_124154_create_lecturers_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2019_08_19_000000_create_failed_jobs_table.php'>2019_08_19_000000_create_failed_jobs_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php'>2019_12_14_000001_create_personal_access_tokens_table.php</a></b></td>
					</tr>
					<tr>
						<td><b><a href='https://github.com/rpiirmdhni/my-gunadarma/blob/master/database/migrations/2025_11_09_112848_create_digibooks_table.php'>2025_11_09_112848_create_digibooks_table.php</a></b></td>
					</tr>
					</table>
				</blockquote>
			</details>
		</blockquote>
	</details>
</details>

---
## 🚀 Getting Started

### ☑️ Prerequisites

Before getting started with my-gunadarma, ensure your runtime environment meets the following requirements:

- **Programming Language:** PHP
- **Package Manager:** NPM, Composer


### ⚙️ Installation

Install my-gunadarma using one of the following methods:

1. Clone the my-gunadarma repository:
```sh
❯ git clone https://github.com/rpiirmdhni/my-gunadarma
```

2. Navigate to the project directory:
```sh
❯ cd my-gunadarma
```

3. Install the Composer dependencies:
```sh
❯ composer install
```

4. Install the Node dependencies:
```sh
❯ npm install
```

5. Setup Environment File:
```sh
❯ cp .env.example .env
```

6. Generate App Key:
```sh
❯ php artisan key:generate
```

7. Configure Database:
Configure in the `.env` file:

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

8. Migrate Database:
```sh
❯ php artisan migrate
```

### 🤖 Usage
Run my-gunadarma using the following command:

```sh
❯ php artisan serve
```

---

## 🔰 Contributing

- **💬 [Join the Discussions](https://github.com/rpiirmdhni/my-gunadarma/discussions)**: Share your insights, provide feedback, or ask questions.
- **🐛 [Report Issues](https://github.com/rpiirmdhni/my-gunadarma/issues)**: Submit bugs found or log feature requests for the `my-gunadarma` project.
- **💡 [Submit Pull Requests](https://github.com/rpiirmdhni/my-gunadarma/blob/main/CONTRIBUTING.md)**: Review open PRs, and submit your own PRs.

<details closed>
<summary>Contributing Guidelines</summary>

1. **Fork the Repository**: Start by forking the project repository to your github account.
2. **Clone Locally**: Clone the forked repository to your local machine using a git client.
   ```sh
   git clone https://github.com/rpiirmdhni/my-gunadarma
   ```
3. **Create a New Branch**: Always work on a new branch, giving it a descriptive name.
   ```sh
   git checkout -b new-feature-x
   ```
4. **Make Your Changes**: Develop and test your changes locally.
5. **Commit Your Changes**: Commit with a clear message describing your updates.
   ```sh
   git commit -m 'Implemented new feature x.'
   ```
6. **Push to github**: Push the changes to your forked repository.
   ```sh
   git push origin new-feature-x
   ```
7. **Submit a Pull Request**: Create a PR against the original project repository. Clearly describe the changes and their motivations.
8. **Review**: Once your PR is reviewed and approved, it will be merged into the main branch. Congratulations on your contribution!
</details>

<details closed>
<summary>Contributor Graph</summary>
<br>
<p align="left">
   <a href="https://github.com{/rpiirmdhni/my-gunadarma/}graphs/contributors">
      <img src="https://contrib.rocks/image?repo=rpiirmdhni/my-gunadarma">
   </a>
</p>
</details>

---

## 🎗 License

This project is protected under the [MIT](https://choosealicense.com/licenses/mit/) License. For more details, refer to the [MIT](https://choosealicense.com/licenses/mit/) file.

---

## 🙌 Acknowledgments

- List any resources, contributors, inspiration, etc. here.

---
