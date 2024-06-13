<?php

// Define income and expence categories 

$categories = [
    'income' => [
        'salary',
        'Investment',
        'Other'
    ],
    'expense' => [
        'Rent',
        'Groceries', 
        'Bills', 
        'Entertaiment',
        'Other',
    ],

];

$income       = [];
$expence      = []; 
$totalIncome  = 0;
$totalExpence = 0;

function displayMenu () {
    echo "1. Add income\n";
    echo "2. Add expence\n ";
    echo "3. View incomes\n ";
    echo "4. View expenses\n ";
    echo "5. View savings\n ";
    echo "6. View categories\n ";
    echo "7.Exit\n ";
    echo "8. Enter your option ";
}

function addIncome () {
    global $income, $categories, $totalexpence;
    echo "Enter Amount";
    $amount = floatval(fgets(STDIN));
    echo "Select category (enter number): \n";
    

    foreach ($categories['income'] as $key => $category) {
        echo  ($key + 1) . " . " . $category . "\n";
    }

    $choice   = intval(fgets(STDIN));
    $category = $categories ['income'] [$choice - 1] ?? 'Other';

    $income [] = [
        'amount'   => $amount,
        'category' => $category

    ];

    $totalIncome  += $amount;
    echo "Income added Successfully!\n";

}

function addExpense () {
    global $expence, $catagories, $totalExpence;
    echo " Enter Amount";
    $amount = floatval(fgets(STDIN));
    echo " Select category (enter number): \n";

    foreach ($catagories['expence'] as $key => $category) {
        echo ($key + 1) . " . " . $category . "\n";
    }
    $choice   = intval(fgets(STDIN));
    $category = $catagories['expence'] [$choice - 1] ?? 'Other';

    $expence [] = [
        'amount'   => $amount,
        'category' => $category
    ];
    $totalExpence += $amount ;
    echo "Expecence added  successfully!\n";

}

function viewIncomes()  {
    global $income;
    if (empty($income)) {
        echo "No income found! \n";
        return ;
    }
    echo "***Incomes***  \n";
    foreach ($income as $key => $item);
    echo  " - Amount:  " . $item ['amount'] . " . Catagory: " . $item['category'];
}

function viewExpence()  {
    global $expence ;
    if (empty($expence)) {
        echo "No expences found.\n";
        return ;
    }
    echo "*** Expences *** \n";
    foreach ($expence as $key => $item) {
        echo " - Amount:  " . $item['amount'] . " . Category:  " . $item['category'];
    }
}function viewSavings() {
    global $totalIncome, $totalExpense;
    $savings = $totalIncome - $totalExpense;
    echo "**Savings:** " . $savings . "\n";
}

function viewCategories() {
    global $categories;
    echo "**Income Categories:**\n";
    foreach ($categories['income'] as $category) {
        echo "  - " . $category . "\n";
    }

    echo "**Expense Categories:**\n";
    foreach ($categories['expense'] as $category) {
        echo "  - " . $category . "\n";
    }
}

do {
    displayMenu();
    $choice = intval(readline());
  
    switch ($choice) {
      case 1:
        addIncome();
        break;
      case 2:
        addExpense();
        break;
      case 3:
        viewIncomes();
        break;
      case 4:
        viewExpence();
        break;
      case 5:
        viewSavings();
        break;
      case 6:
        viewCategories();
        break;
      case 7:
        echo "Exiting...\n";
        break;
      default:
        echo "Invalid option.\n";
    }
  } while ($choice !== 7);