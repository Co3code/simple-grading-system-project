<?php
$this->layout('Layout', ['mainContent' => $this->fetch('Layout')]);
$this->start('mainContent');

function preserve_digit_view($n, $data)
{
    return htmlspecialchars($data["digit$n"] ?? '');
}
?>

<link rel="stylesheet" href="/css/login-style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
<script src="https://www.google.com/recaptcha/api.js?render=<?= htmlspecialchars($recaptchaSiteKey) ?>"></script>

<button class="close-parent-btn1" type="button" onclick="window.location.href='/'">
    <i class="fas fa-times"></i>
</button>

<div class="login-wrapper">
    <div class="parent-login-wrapper <?= $keepParentOpen ? 'active' : '' ?>" id="parentLoginWrapper">

        <button class="parent-toggle-btn <?= $keepParentOpen ? 'active' : '' ?>" id="parentToggleBtn" type="button">
            <i class="fa-solid fa-angle-left"></i>
        </button>

        <div class="parent-login-container" id="parentLoginContainer">
            <button class="close-parent-btn" id="closeParentBtn" type="button">
                <i class="fas fa-times"></i>
            </button>

            <h2>Parent's Login</h2>

            <?php if ($parentError): ?>
                <div class="error-message"><?= htmlspecialchars($parentError) ?></div>
            <?php endif; ?>

            <form method="POST" action="/login/parent" id="parentLoginForm">
                <label for="parent_id" class="id-number-label">ID Number</label>
                <div class="id-number">
                    <input type="text" name="digit1" maxlength="1" value="C" readonly tabindex="-1">
                    <input type="text" name="digit2" maxlength="1" pattern="\d" title="Digit 2" autocomplete="off" value="<?= preserve_digit_view(2, $this->data) ?>" data-digit="2">
                    <input type="text" name="digit3" maxlength="1" pattern="\d" title="Digit 3" autocomplete="off" value="<?= preserve_digit_view(3, $this->data) ?>" data-digit="3">
                    <input type="text" name="digit4" maxlength="1" value="-" readonly tabindex="-1">
                    <input type="text" name="digit5" maxlength="1" pattern="\d" title="Digit 5" autocomplete="off" value="<?= preserve_digit_view(5, $this->data) ?>" data-digit="5">
                    <input type="text" name="digit6" maxlength="1" pattern="\d" title="Digit 6" autocomplete="off" value="<?= preserve_digit_view(6, $this->data) ?>" data-digit="6">
                    <input type="text" name="digit7" maxlength="1" pattern="\d" title="Digit 7" autocomplete="off" value="<?= preserve_digit_view(7, $this->data) ?>" data-digit="7">
                    <input type="text" name="digit8" maxlength="1" pattern="\d" title="Digit 8" autocomplete="off" value="<?= preserve_digit_view(8, $this->data) ?>" data-digit="8">
                </div>

                <div class="security-answer-section <?= $showSecurityQuestion ? 'show' : '' ?>" id="securityAnswerSection">
                    <div class="parent-question show" id="securityQuestionText"><?= htmlspecialchars($security_question) ?></div>
                    <div class="form-group">
                        <label for="parent_security_answer">Answer</label>
                        <input type="text" id="parent_security_answer" name="parent_security_answer" autocomplete="off" />
                    </div>
                </div>

                <button type="submit" name="parent_authenticate">Login</button>
            </form>

            <div class="signup-link">
                Don't have an account? <a href="/register">SIGN UP Here</a>
            </div>
        </div>
    </div>

    <div class="login-container">
        <h2>Login</h2>
        <?php if ($error): ?>
            <div class="error-message"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['message'])): ?>
            <div class="success-message"><?= htmlspecialchars($_SESSION['message']) ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>
        <form id="loginForm" method="POST" action="/login">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required autocomplete="email" autofocus />
            </div>
            <div class="form-group" style="margin-bottom: 25px;">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required autocomplete="current-password" />
                <i class="fa fa-eye toggle-password" id="togglePassword" title="Show/Hide Password"></i>
            </div>
            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" />
            <button type="submit" name="login">Login</button>
        </form>

        <div class="signup-link">
            Don't have an account? <a href="/register">Sign Up Here</a>
        </div>
    </div>
</div>

<script src="/js/login-script.js"></script>

<?php $this->stop(); ?>