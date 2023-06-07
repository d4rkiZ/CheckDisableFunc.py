import requests
import re

def check_phpinfo():
    url = input("Enter the URL of the PHP info page: ")

    # Send a request to the PHP info page
    response = requests.get(url)
    phpinfo = response.text

    # Find the disable_functions line in PHP info
    disable_functions_match = re.search(r'<td class="e">disable_functions<\/td><td class="v">(.*?)<\/td>', phpinfo, re.DOTALL)
    
    if disable_functions_match:
        disable_functions_value = disable_functions_match.group(1)
        disable_functions_value = disable_functions_value.replace('&nbsp;', '')
        disabled_functions = disable_functions_value.split(',')

        # Functions to check if they are disabled
        vulnerable_functions = [
            'system',
            'exec',
            'passthru',
            'shell_exec',
            'popen',
            'proc_open',
            'eval',
            'system_shell',
            'proc_close'
        ]

        unblocked_functions = []

        # Compare disabled functions with vulnerable functions
        for function in vulnerable_functions:
            if function.strip() not in disabled_functions:
                unblocked_functions.append(function)

        if unblocked_functions:
            print("Unblocked functions:")
            for index, function in enumerate(unblocked_functions):
                print(f"{index + 1}. {function}")

            choice = input("Choose a function (enter the corresponding number): ")
            choice = int(choice)

            if choice in range(1, len(unblocked_functions) + 1):
                selected_function = unblocked_functions[choice - 1]
                file_mapping = {
                    'system': 'execFunction.php',
                    'exec': 'execFunction.php',
                    'passthru': 'passthruFunction.php',
                    'shell_exec': 'shell_execFunction.php',
                    'popen': 'popenFunction.php',
                    'proc_open': 'ProcOpenFunction.php',
                    'eval': 'evalFunction.php',
                    'system_shell': 'system_shellFunction.php',
                    'proc_close': 'ProcCloseFunction.php'
                }
                file_name = file_mapping.get(selected_function, 'defaultFunction.php')
                print(f"Please use {file_name} for the selected function.")
            else:
                print("Invalid choice.")
        else:
            print("All vulnerable functions are disabled.")
    else:
        print("Could not find disable_functions in PHP info.")

check_phpinfo()
