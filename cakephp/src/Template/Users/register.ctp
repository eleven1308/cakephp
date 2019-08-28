<div class="container card">
    <?php
        # Set Form Template
        $myTemplates = [
            'inputContainer' => '<div class="form-group">{{content}}</div>',
            // 'input' => '<input type="{{type}}" class="form-control is-invalid" name="{{name}}"{{attrs}}/>',
            'inputContainerError' => '<div class="form-group {{required}} error">{{content}}{{error}}</div>',
            'error' => '<div class="invalid-feedback">{{content}}</div>',
        ];
        $this->Form->setTemplates($myTemplates);

        echo $this->Form->create($users);

        # Check field error
        // var_dump($this->Form->isFieldError('fullname'));

        echo $this->Form->controls(
            [
                'full_name' => [
                    'placeholder' => "Full Name", 
                    'required' => false,
                    'label' => 'Full Name',
                    'class' => ($this->Form->isFieldError('full_name')) ? 'form-control is-invalid' : 'form-control'
                ],
                'email' => [
                    'placeholder' => "Email Address", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('email')) ? 'form-control is-invalid' : 'form-control'
                ],
                'username' => [
                    'placeholder' => "Username", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('username')) ? 'form-control is-invalid' : 'form-control'
                ],
                'numberphone' => [
                    'placeholder' => "Number Phone", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('numberphone')) ? 'form-control is-invalid' : 'form-control'
                ],
                'birthday' => [
                    'id' => 'datepicker',
                    'data-date-format' => 'dd-mm-yyyy',
                    'class' => 'form-control input-group date',
                    'required' => false
                    
                ],
                'password' => [
                    'placeholder' => "Password", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('password')) ? 'form-control is-invalid' : 'form-control'
                ],
                'confirmpassword' => [
                    'type' => 'password',
                    'name' => 'confirmpassword', 
                    'placeholder' => "Confirm Password", 
                    'required' => false,
                    'label' => 'Confirm Password',
                    'class' => ($this->Form->isFieldError('confirmpassword')) ? 'form-control is-invalid' : 'form-control'
                ],
            ],
            ['legend' => 'User Register']
        );
        echo $this->Form->button('<i class="fa fa-sign-in"></i>Register', [
            'class' => 'btn btn-success', 
            'type' => 'submit',
            'escape' => false
        ]);
        // echo $this->Form->submit('Registration', ['class' => 'btn btn-success']);
        echo $this->Form->end();
    ?>
</div>
<script type="text/javascript">
    $(function () {  
        $("#datepicker").datepicker({         
        autoclose: true,         
        todayHighlight: true 
        }).datepicker('update', new Date());
    });
</script>