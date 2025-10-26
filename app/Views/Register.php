<?php
$this->layout('Layout', ['mainContent' => $this->fetch('Layout')]);
$this->start('mainContent');

function preserve_post_view($key, $data)
{
    return htmlspecialchars($data['formData'][$key] ?? '', ENT_QUOTES);
}

function preserve_digit_view($n, $data)
{
    $key = "digit$n";
    $value = $data['formData'][$key] ?? '';
    return preg_match('/^\d$/', $value) ? $value : '';
}

function is_selected_view($val, $compare)
{
    return $val === $compare ? 'selected' : '';
}

function is_checked_view($val, $compare)
{
    return $val == $compare ? 'checked' : '';
}
?>

<link rel="stylesheet" href="/css/register-style.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<?php if ($error): ?>
    <p class="error"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<?php if ($success): ?>
    <p class="success"><?= htmlspecialchars($success) ?></p>
<?php endif; ?>

<form method="POST" action="/register">

    <div class="form-header">
        <img src="img/ckclogo.png" alt="CKC Logo">
        <h2>Register</h2>
    </div>

    <label>First Name:</label><br>
    <input type="text" name="first_name" value="<?= preserve_post_view('first_name', $this->data) ?>" required autocomplete="off"><br>

    <label>Middle Name (optional):</label><br>
    <input type="text" name="middle_name" value="<?= preserve_post_view('middle_name', $this->data) ?>" autocomplete="off"><br>

    <label>Last Name:</label><br>
    <input type="text" name="last_name" value="<?= preserve_post_view('last_name', $this->data) ?>" required autocomplete="off"><br>

    <label>Suffix (optional):</label><br>
    <select name="suffix">
        <option value="">-- None --</option>
        <?php foreach ($allowedSuffixes as $suffixOption): ?>
            <option value="<?= htmlspecialchars($suffixOption) ?>" <?= is_selected_view(preserve_post_view('suffix', $this->data), $suffixOption) ?>><?= htmlspecialchars($suffixOption) ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Year Level:</label><br>
    <div class="year-level-group">
        <?php foreach ($allowedYearLevels as $level): ?>
            <label class="radio-label">
                <input type="radio" name="year_level" value="<?= $level ?>" <?= is_checked_view(preserve_post_view('year_level', $this->data), $level) ?> required>
                <span><?= $level ?></span>
            </label>
        <?php endforeach; ?>
    </div>

    <label>ID Number:</label><br>
    <div class="id-number">
        <input type="text" name="digit1" maxlength="1" value="C" readonly tabindex="-1" style="background: #0b0b18ff;color:#555;font-weight:bold;">
        <input type="text" name="digit2" maxlength="1" pattern="\d" title="Digit 2" required autocomplete="off" value="<?= preserve_digit_view(2, $this->data) ?>">
        <input type="text" name="digit3" maxlength="1" pattern="\d" title="Digit 3" required autocomplete="off" value="<?= preserve_digit_view(3, $this->data) ?>">
        <input type="text" name="digit4" maxlength="1" value="-" readonly tabindex="-1" style="background: #0b0b18ff;color:#555;font-weight:bold;">
        <input type="text" name="digit5" maxlength="1" pattern="\d" title="Digit 5" required autocomplete="off" value="<?= preserve_digit_view(5, $this->data) ?>">
        <input type="text" name="digit6" maxlength="1" pattern="\d" title="Digit 6" required autocomplete="off" value="<?= preserve_digit_view(6, $this->data) ?>">
        <input type="text" name="digit7" maxlength="1" pattern="\d" title="Digit 7" required autocomplete="off" value="<?= preserve_digit_view(7, $this->data) ?>">
        <input type="text" name="digit8" maxlength="1" pattern="\d" title="Digit 8" required autocomplete="off" value="<?= preserve_digit_view(8, $this->data) ?>">
    </div>

    <label>Phone Number:</label><br>
    <input type="tel" name="phone_number" placeholder="09XXXXXXXXX or +639XXXXXXXXX" required autocomplete="off" value="<?= preserve_post_view('phone_number', $this->data) ?>"><br>

    <label>Email (@ckcgingoog.edu.ph only):</label><br>
    <div class="email-verify-group">
        <input type="email" name="email" id="emailInput" required autocomplete="off" value="<?= preserve_post_view('email', $this->data) ?>">
        <button type="button" id="sendCodeBtn">Send Code</button>
    </div>

    <label>Verification Code:</label><br>
    <div class="verification-code">
        <?php for ($i = 1; $i <= 6; $i++): ?>
            <input type="text" name="verify_digit<?= $i ?>" maxlength="1" pattern="\d" title="Digit <?= $i ?>" required autocomplete="off" value="">
        <?php endfor; ?>
    </div>

    <label>Security Question:</label><br>
    <select name="security_question" required>
        <option value="">-- Select a security question --</option>
        <?php foreach ($securityQuestions as $sq): ?>
            <option value="<?= htmlspecialchars($sq) ?>" <?= is_selected_view(preserve_post_view('security_question', $this->data), $sq) ?>><?= htmlspecialchars($sq) ?></option>
        <?php endforeach; ?>
    </select><br>

    <label>Security Answer:</label><br>
    <input type="text" name="security_answer" required autocomplete="off" value=""><br>

    <label id="passwordLabel" for="password">Password:<span id="passwordStrength"></span></label>
    <div class="password-container">
        <input type="password" id="password" name="password" required autocomplete="off" value="">
        <i class="fa fa-eye toggle-password" id="togglePassword" title="Show/Hide Password"></i>
    </div>

    <label for="confirm_password">Confirm Password:</label>
    <div class="password-container">
        <input type="password" id="confirm_password" name="confirm_password" required autocomplete="off" value="">
        <i class="fa fa-eye toggle-password" id="toggleConfirmPassword" title="Show/Hide Password"></i>
    </div>

    <div class="g-recaptcha" data-sitekey="<?= htmlspecialchars($recaptchaSiteKey) ?>"></div>

    <button type="submit" name="register" id="registerBtn">Register</button>

    <div class="signup-link">
        Already have an account? <a href="/login">Log In Here</a>
    </div>
</form>

<script src="/js/register-script.js"></script>

<?php $this->stop(); ?>