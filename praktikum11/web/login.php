<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../src/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <title>Login</title>
</head>
<body class="bg-dark-gradient min-h-screen flex flex-col items-center justify-center gap-3 font-jakarta">
    
    <h2 class="text-white text-3xl font-bold">Selamat datang</h2>

    <div class="bg-white/20 backdrop-blur-md text-white p-10 border border-white/50 rounded-lg flex flex-col items-center justify-center w-96">

        <form class="w-full" method="post" action="proses_login.php">
            <div class="flex flex-col mb-6">    
                <label class="form_label">Username</label>
                <input 
                type="text" 
                name="username" 
                placeholder="Admin" 
                class="w-full bg-white/10 border border-gray-300/50 rounded-md mt-2 px-2 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
                required>
            </div>
            
            <div class="flex flex-col mb-6">
                <label class="form_label">Password</label>
                <input 
                type="password" 
                name="password" 
                placeholder="••••••••" 
                class="w-full bg-white/10 border border-gray-300/50 rounded-md mt-2 px-2 py-2 focus:outline-none focus:ring-2 focus:ring-blue-300"
                required>

            </div>

            <button 
            type="submit"
            class="group w-full bg-ijo py-2 rounded-md font-semibold hover:bg-blue-400 transition duration-300 ease-in-out">
            <span class="text-dark-gradient group-hover:text-white group-hover:bg-none group-hover:[-webkit-text-fill-color:white] duration-300 ease-in-out">
                Login
            </span>
            </button>

            <?php if (isset($_GET['message'])): ?>
                <div class="alert alert-info text-center p-1 mt-3 bg-amber-300 rounded-md">
                    <span class="text-dark-gradient">
                        <?= htmlspecialchars($_GET['message']) ?>
                    </span>
                </div>
            <?php endif; ?>
        </form>
    </div>

    <script>
        if (window.location.search.includes("message=")) {
        window.history.replaceState({}, document.title, "login.php");
        }
    </script>
</body>
</html>
